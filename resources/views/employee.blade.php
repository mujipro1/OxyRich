<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/employee.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favIcon.png')}}">
    <title>Oxyrich</title>
</head>

<body>
    <div class="c1">

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav3 navbar-expand-lg"></nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="mt-3 col-md-12">
                    <div class='p-4 contlayout'>
                        <h2> John Doe </h2>
                        <p> Employee ID: 123456 </p>
                        <p>john.doe@example.com</p>
                        <p> 456, XYZ Street, ABC Town, Lahore </p>
                        <button class="myBtn2" onclick="window.location.href='/sectors'">
                        Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script>
document.getElementById("dashboard").classList.add("active");
</script>

</html>