<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PayPal Payment</title>
  </head>
  <body>
    <div class="container">
        <h1 class="text-center mt-5">All Product</h1>
        <div class="col-md-3">
            <div class="card p-2">


                <h3>name : mobile</h3>
                <h3>price : 50</h3>
                <br>
                <form action="{{ route('paypal') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mobile" value="50">
                <button type="submit" class="btn btn-primary">pay with paypal</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
