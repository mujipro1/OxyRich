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
                <div class="mt-3 col-md-7">
                    <div class='p-4 contlayout'>
                        <h2> Ali Khan </h2>
                        <p> 0300-1234567 </p>
                        <p>alikhan@gmail.com</p>
                        <p> 123, ABC Street, XYZ Town, Lahore </p>
                        <button class="myBtn2">Edit</button>
                    </div>
                </div>
                <div class='col-md-5 mt-3'>
                    <div class='p-4 contlayout'>
                        <h2> Details </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col-md-12 my-4'>
                    <div class='contlayout p-4'>
                        <h2> Orders </h2>
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