<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="c1">
        <div class="container pb-5">
            <div class="row">
                <nav class="navbar navbar-expand-lg"></nav>
            </div>
        </div>

        <section>
        <img src="{{asset('images/homePic.jpg')}}" alt="" class="bg-img">
            <div class='container'>
                <div class='row py-1'>
                    <div class='col-md-6 my-3 side2 blurrCar'>
                    </div>
                    <div class='col-md-6 my-3 side1'>
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