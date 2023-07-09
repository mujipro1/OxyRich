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

    <div class="container">
            <div class="row">

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button onclick="redirectBack()"
                        class="backBtn">
                        < </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <form action="{{route('submitBottles')}}" method="post">
                            @CSRF
                        <h2 class='my-2'>Bottle Details</h2>

                        <div class="label-select-container">
                            <label for="loaded_bottles" class="form-label">Loaded Bottles</label>
                            @if($bottles)
                            <input required type="number" name="loaded_bottles" id="loaded_bottles" class="form-control my-3" value="{{$bottles}}">
                            @else
                            <input required type="number" name="loaded_bottles" id="loaded_bottles" class="form-control my-3">
                            @endif
                        </div>
                    
                    
                        <div class="label-select-container my-3">
                            <label class="form-label">Bottles Given</label>
                            <label>{{$filled}}</label>
                        </div>

                        <div class="label-select-container my-3">
                            <label class="form-label">Bottles Left</label>
                            <label>{{$bottles-$filled}}</label>
                        </div>

                        <div class="label-select-container my-3">
                            <label class="form-label">Emptied Bottles</label>
                            <label>{{$empty}}</label>
                        </div>

                        <div class='text-center'>
                            <button type="submit" class="myBtn5 my-5 ">Save</button>
                        </div>
                        
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>


   
    <footer></footer>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/header.js')}}"></script>
<script>
document.getElementById("dashboard").classList.add("active");
function redirectBack(){
    window.location.href = "{{route('employee', ['employee' => $employee])}}";
}

</script>

</html>