<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
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

        <div class=" d-flex accessDeny justify-content-center ">
            <h3 class="text-muted m-4">OOPs! You are not authorized to access this page.</h3>
            <img src="{{asset('images/brokelink.png')}}" alt="access denied" class="mx-3 img-fluid brokeLink">
        </div>

        <div class="accessbuttons d-flex justify-content-center">
            <button class="myBtn m-2 my-4" type="button" onclick="window.location.href='/login'">
                Login </button>
            <button class="myBtn2 m-2 my-4" type="button" onclick="window.location.href='/home'">
             Home </button>
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