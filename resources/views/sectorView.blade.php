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
                <nav class="navbar nav3 navbar-expand-lg"></nav>
            </div>
        </div>

        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif

        <div class="container">
            <div class="row">

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button onclick="window.location.href='/employee'"
                        class="backBtn">
                        < </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <form action="{{route('submitSector')}}" method="post">
                            @CSRF
                        <h2 class='my-2'>Place Order</h2>

                        <div class="label-select-container">
                            <label for="sector" class="form-label">Choose Sector</label>
                            <select name="sector" id="sector" class="form-control my-3">
                                <option value="Select Sector" disabled selected>Select Sector</option>
                            </select>
                        </div>
                    
                        <div class="label-select-container">
                            <label for="subsector" id="subLabel" class="muted form-label">Choose Subsector</label>
                            <select disabled name="subsector" id="subsector" class="form-control my-3">
                            <option value="Select Subsector" disabled selected>Select Subsector</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type='submit' id="submitBtn" class="myBtn2 mt-4">Next</button>
                        </div>

                        </form>
                    
                    </div>
                </div>
            </div>
        </div>


        <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script src="{{asset('js/subsector.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("dashboard").classList.add("active");
</script>

</html>