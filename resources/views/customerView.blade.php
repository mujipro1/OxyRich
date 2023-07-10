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
                <nav class="navbar nav4 navbar-expand-lg"></nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="my-3 col-md-12">
                    <div class='p-4 contlayout' style='min-height:16vh;'>
                        <h2 class='px-3'> {{$customer->name}} </h2>
                        <div class='px-4 muted'> Customer </div>
                        <div class='px-4'> {{$customer->phone_no}} </div>
                        <div class='px-4'> {{$customer->address}} </div>
                    </div>
                </div>
                <div class="my-3 col-md-6">
                    <div class='p-4 contlayout'>
                        <h3 class='mb-4'> Details </h3>
                        <p class="text-muted my-2 " >View your personal details, packages , bottle prices </p>
                        <button class="myBtn3 my-2">Personal Details</button>
                        <p class="text-muted mt-4 my-2 " >View your Orders, Invoices </p>
                        <button class="myBtn4 my-2">Order Details</button>
                    </div>
                </div>
                <div class='col-md-6 my-3'>
                    <div class='p-4 contlayout d-flex justify-content-center'>
                        <img style="height: 330px; width:330px;"
                        src="{{asset('images/Bottles.jpg')}}" class='img-fluid'>
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
</script>

</html>