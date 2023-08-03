<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function payment(Request $request)
    {
        // dd($request->mobile);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" =>[
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ],
            "purchase_units" => [
                 [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->mobile
                      ]
                 ]
              ]
        ]);
        // dd($response);
        if(isset($response['id']) && $response['id']!= null){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){
                    return redirect()->away($link['href']);
                }
            }
        } else{
            return redirect()->route('paypal.cancel');
        }
    }

    public function success(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
            return "payment successfull";
        }else{
            return redirect()->route('paypal.cancel');
        }
    }
    public function cancel(){
        return "payment cancel";
    }
}
