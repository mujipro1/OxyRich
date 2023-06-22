<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/sector.css')}}" rel="stylesheet">
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

    <div class='inside-div'>
        <div class='container'>
            <div class='row justify-content-evenly'>
                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" data-sector="D">
                            Sector D
                        </button>
                </div>

                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" data-sector="E">
                            Sector E
                        </button>
                    </div>
            </div>
        </div>

        <div class='container'>
            <div class='row justify-content-evenly'>
                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" data-sector="F">
                            Sector F
                        </button>
                </div>

                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" data-sector="G">
                            Sector G
                        </button>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" data-sector="H">
                            Sector H    
                        </button>
                </div>

                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" data-sector="I">
                            Sector I
                        </button>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" >
                            BlueArea   
                        </button>
                </div>

                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button">
                            Chatha Bakhtawar
                        </button>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" ">
                            RawalPindi  
                        </button>
                </div>
                <div class='col-md-6 my-4'>
                        <button class="myBtn2 btn btn-dark" type="button" ">
                            Others  
                        </button>
                </div>
            </div>
        </div>
    </div>

        <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script src="{{asset('js/subsector.js')}}"></script>
<script>
    document.getElementById("dashboard").classList.add("active");
</script>

</html>
