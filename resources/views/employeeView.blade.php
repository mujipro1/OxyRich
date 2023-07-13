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

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        {{Session::forget('success')}}
    @endif

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav3 navbar-expand-lg"></nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="my-3 col-md-12">
                    <div class='p-4 contlayout' style='min-height:16vh;'>
                        <h2 class='px-3'> {{$employee->name}} </h2>
                        <div class='px-4 muted'> Employee </div>
                        <div class='px-4'> {{$employee->phone_no}} </div>
                        <div class='px-4'> {{$employee->address}} </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-md-6 my-3'>
                    <div class='p-4 contlayout' style='min-height:16vh;'>
                        <h2> Place Order </h2>
                        <button class="myBtn4 m-2 my-4" type="button" onclick="window.location.href='/sectors'">
                            Place Order 
                            <svg xmlns="http://www.w3.org/2000/svg" id="addNewSvg2" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M17,12c0,.553-.448,1-1,1h-3v3c0,.553-.448,1-1,1s-1-.447-1-1v-3h-3c-.552,0-1-.447-1-1s.448-1,1-1h3v-3c0-.553,.448-1,1-1s1,.447,1,1v3h3c.552,0,1,.447,1,1Zm7-7v14c0,2.757-2.243,5-5,5H5c-2.757,0-5-2.243-5-5V5C0,2.243,2.243,0,5,0h14c2.757,0,5,2.243,5,5Zm-2,0c0-1.654-1.346-3-3-3H5c-1.654,0-3,1.346-3,3v14c0,1.654,1.346,3,3,3h14c1.654,0,3-1.346,3-3V5Z"/></svg>
                        </button>
                    </div>
                </div>
                <div class='col-md-6 my-3'>
                    <div class="p-4 contlayout" style='min-height:16vh;'>
                        <h2 > Bottle Details </h2>
                        <button class="myBtn4 m-2 my-4" type="button" onclick='redirectToBottleDetails()'>
                            Bottle Details
                        <svg xmlns="http://www.w3.org/2000/svg" id="addNewSvg2" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M20,8.016C20.152,5.423,16.873,4.853,15,4V2a1,1,0,0,0,0-2H9A1,1,0,0,0,9,2V4L6.514,5A3.219,3.219,0,0,0,4.575,10H15a1,1,0,0,1,0,2H4.574a3.828,3.828,0,0,0,0,4H15a1,1,0,0,1,0,2H4.574A3.991,3.991,0,0,0,8,24h8a4.006,4.006,0,0,0,2.618-7,3.993,3.993,0,0,0,0-6A4.007,4.007,0,0,0,20,8.016Z"/></svg>
                        </button>
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

function redirectToBottleDetails() {
    window.location.href = '/bottleDetails{{$employee->username}}';
}
</script>

</html>