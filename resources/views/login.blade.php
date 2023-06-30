<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favIcon.png')}}">

    <title>Oxyrich</title>
</head>

<body>

    @if(Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif

    <div class="c1">
        <div class="container pb-5">
            <div class="row">
                <nav class="navbar navbar-expand-lg"></nav>
            </div>
        </div>

        <section>
            <div class='container'>
                <div class='row crow py-1'>
                    <div class='col-md-6 my-3 side2'>
                        <form action="/submit-form" method='post'>
                            @CSRF
                            <h3 class='pt-4 greet mt-3'>Hey, Hello👋</h3>
                            <p class='pb-3 greet'>Sign in to your account</p>
                            <div class='px-4'>
                                <label for='name' class='px-3' for='name'>Name</label>
                                <input type='name' name='username' class='form-control' required/>
                                <label class='px-3' for='password'>Password</label>
                                <input name='password' type="password" class="form-control m-2" required>

                                <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label mt-1" for="remember">Remember me</label>
                                <a href="#" class="text-decoration-none forgot float-end mt-1">Forgot Password?</a>
                                <button class='btn loginBtn mt-4'>Login</button>
                                </div>
                            </form>
                        </div>
                        <div class='col-md-6 my-3 side1'>
                            <div class='blurrCard'>
                                Clear and Pure <span>Water</span> at your doorstep
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("login").classList.add("active");
</script>
</html>