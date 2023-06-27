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

    @if(Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
    @endif

    @if(Session::get('emptyID'))
    <div class="alert alert-danger">
        {{Session::get('emptyID')}}
    </div>
    @endif

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav2 navbar-expand-lg"></nav>
            </div>
        </div>


        <div class="container side">
            <div class="row">
                <div class="mt-3 col-md-6">
                    <div class='p-4 contlayout'>
                       <h2> Orders </h2>
                       <p class="m-3 text-muted"> View orders of today or all orders. </p>
                       <button onclick="window.location.href='/viewOrderDetails1'" class="myBtn3 m-2">Today's Orders</button>
                       <button onclick="window.location.href='/viewOrderDetails2'" class="myBtn4 m-2">All Orders</button>
                    </div>
                </div>
                <div class='col-md-6 mt-3'>
                    <div class='p-4 contlayout'>
                        <form action="{{route('viewUsers')}}" method='post'>
                            @CSRF
                            <h2> Users </h2>
                            <p class="m-3 text-muted"> Password is required for accessing this information </p>
                            <input name='password' type="text" placeholder="Enter Password" class="form-control m-2" required>
                            <input hidden value='' name='caller' id='caller' class="form-control">
                            <button onclick="setCaller('C')" type='submitsd' class="myBtn3 m-2">View Customers</button>
                            <button onclick="setCaller('E')"  class="myBtn4 m-2">View Employees</button>
                            <p class="m-3 text-muted"> Admin has the right to add, edit and delete users. </p>
                        </form>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-12 my-3">
                    <div class='p-4 contlayout'>
                        <h2> Sales Graph </h2>
                        <p class="m-3 text-muted"> Sales graph of the last 30 days. </p>
                        <div class="graph">
                            <canvas id="myChart"></canvas>
                        </div>
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

function setCaller(e){
    document.querySelector("#caller").value = e;
}
</script>

</html>