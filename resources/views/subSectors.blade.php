<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/subsector.css')}}" rel="stylesheet">
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

        <div class='container'>
            <div class='column'>
                <div class='col-md-12 my-4'>
                    <div class='contlayout p-4'>
                        <script>
                        var sectors = ['Sector D-11', 'Sector D-12', 'Sector D-13', 'Sector D-14', 'Sector D-15', 'Sector D-16', 'Sector D-17'];

                        var container = document.querySelector('.contlayout');

                        for (var i = 0; i < sectors.length; i++) {
                            var button = document.createElement('button');
                            button.className = 'myBtn2 btn btn-dark';
                            button.type = 'button';
                            button.textContent = sectors[i];

                            container.appendChild(button);
                        }
                        </script>
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
