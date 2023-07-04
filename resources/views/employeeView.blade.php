<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/customer.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favIcon.png')}}">
    <title>Oxyrich</title>
</head>

<body>
    <div class="c1">

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav2 navbar-expand-lg"></nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class='col-md-5 my-3'>
                    <div class='p-4 contlayout'>
                        <h2> Place Order </h2>
                        <button class="myBtn3 m-2 my-4" type="button" onclick="window.location.href='/sectors'">
                            Place Order </button>
                        <button class="myBtn3 m-2 my-4" type="button" onclick='redirectToBottleDetails()'>
                            Bottle Details </button>
                    </div>
                </div>
                <div class="my-3 col-md-7">
                    <div class='p-4 contlayout'>
                        <h2> {{$employee->name}} </h2>
                        <p> {{$employee->phone_no}} </p>
                        <p> {{$employee->address}} </p>
                    </div>
                </div>
            </div>
        </div>

        <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("dashboard").classList.add("active");

function redirectToBottleDetails() {
    window.location.href = '/bottleDetails{{$employee->username}}';
}
</script>

</html>