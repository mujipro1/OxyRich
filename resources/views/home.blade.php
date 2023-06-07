<!DOCTYPE html>
<html lang="en">

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
                <nav class="navbar navbar-expand-lg"></nav>
            </div>
        </div>

        <section>
            <div class='container c2'>
                <div class="row pt-5">
                    <div class="col-md-6">
                        <h1 class="text-center mt-5">Welcome to <span class="logoText">OxyRich</span></h1>
                        <p class="text-center px-5 py-2">Quench your thirst sustainably with our refreshing water bottle supply.
                            Stay hydrated, eco-friendly, and make a positive impact on the planet, one sip at a time.</p>
                        <div class="text-center my-5">
                            <button onclick = "window.location.href='/login'" class="myBtn">Login</button>                            
                            <button onclick = "window.location.href='/contact'" class="myBtn2">Contact</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('images/homePic.jpg')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script>
    document.getElementById("home").classList.add("active");
</script>
</html>