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

        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{Session::get('success')}}</strong>
        </div>  
        {{Session::forget('success')}}
        @endif

        <div class="container">
            <div class="row">

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button onclick="redirectBack()" class="backBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="812" height="812"><path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z"/></svg>            
            </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <h2 class='my-2 mb-4'>Add Location</h2>

                        <div class="container my-4  specHighlight">
                            <div class="row align-items-center">
                                <div class="col divx">
                                    <span><strong>Existing Sector</strong></span>
                                </div>
                                <div class="col-auto">
                                    <button id='drop1' class="myBtn6">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Bold" class="up1"
                                            viewBox="0 0 24 24" width="512" height="512">
                                            <path
                                                d="M1.51,6.079a1.492,1.492,0,0,1,1.06.44l7.673,7.672a2.5,2.5,0,0,0,3.536,0L21.44,6.529A1.5,1.5,0,1,1,23.561,8.65L15.9,16.312a5.505,5.505,0,0,1-7.778,0L.449,8.64A1.5,1.5,0,0,1,1.51,6.079Z" />
                                        </svg>
                                        <svg style="display:none;" xmlns="http://www.w3.org/2000/svg" id="Bold"
                                            class="down1" viewBox="0 0 24 24" width="512" height="512">
                                            <path
                                                d="M22.5,18a1.5,1.5,0,0,1-1.061-.44L13.768,9.889a2.5,2.5,0,0,0-3.536,0L2.57,17.551A1.5,1.5,0,0,1,.449,15.43L8.111,7.768a5.505,5.505,0,0,1,7.778,0l7.672,7.672A1.5,1.5,0,0,1,22.5,18Z" />
                                        </svg>

                                    </button>
                                </div>
                            </div>
                            <form action="{{route('addNewLocation')}}" method="post">
                            @csrf
                            <div class='div1 hidden'>
                                <div class="row">
                                    <div class="my-2 col-md-6 label-select-container">
                                        <label class=" form-label mt-2">Sector</label>
                                        <select class="form-select" name="sector" id="sector">
                                            <option disabled selected>Select Sector</option>
                                            @foreach($sectors as $sector)
                                            <option value="{{$sector->sector}}">{{$sector->sector}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="my-2 col-md-6 label-select-container">
                                        <label class=" form-label mt-2">Subsector</label>
                                        <input type="text" name="subsector" id="subsector"
                                            class="muted form-control" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="myBtn5 my-4">Add</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>


                        <div class="container my-4 specHighlight">
                            <div class="row align-items-center">
                                <div class="col divx2">
                                    <span><strong>New Sector</strong></span>
                                </div>
                                <div class="col-auto">
                                    <button id='drop2' class="myBtn6 btn2">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Bold" class="up2"
                                            viewBox="0 0 24 24" width="512" height="512">
                                            <path
                                                d="M1.51,6.079a1.492,1.492,0,0,1,1.06.44l7.673,7.672a2.5,2.5,0,0,0,3.536,0L21.44,6.529A1.5,1.5,0,1,1,23.561,8.65L15.9,16.312a5.505,5.505,0,0,1-7.778,0L.449,8.64A1.5,1.5,0,0,1,1.51,6.079Z" />
                                        </svg>

                                        <svg style="display:none;" xmlns="http://www.w3.org/2000/svg" id="Bold"
                                            class="down2" viewBox="0 0 24 24" width="512" height="512">
                                            <path
                                                d="M22.5,18a1.5,1.5,0,0,1-1.061-.44L13.768,9.889a2.5,2.5,0,0,0-3.536,0L2.57,17.551A1.5,1.5,0,0,1,.449,15.43L8.111,7.768a5.505,5.505,0,0,1,7.778,0l7.672,7.672A1.5,1.5,0,0,1,22.5,18Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <form action="{{route('addNewLocation')}}" method="post">
                            @csrf
                            <div class='div2 hidden'>
                                <div class="row">
                                    <div class="my-2 col-md-6 label-select-container">
                                        <label class=" form-label mt-2">Sector</label>
                                        <input type="number" id='sector' name="sector"
                                            class="muted form-control" required>
                                    </div>
                                    <div class="my-2 col-md-6 label-select-container">
                                        <label class=" form-label mt-2">Subsector</label>
                                        <input type="number" id='subsector' name="subsector"
                                            class="muted form-control" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="myBtn5 my-4">Add</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

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
function redirectBack() {
    window.location.href = "{{route('admin', ['admin' => $admin])}}";
}
divx1 = document.querySelector(".divx");
divx2 = document.querySelector(".divx2");
btn6 = document.querySelector(".myBtn6");
btn2 = document.querySelector(".btn2");

up1 = document.querySelector(".up1");
down1 = document.querySelector(".down1");

up2 = document.querySelector(".up2");
down2 = document.querySelector(".down2");

div1 = document.querySelector(".div1");
div2 = document.querySelector(".div2");

divx1.addEventListener('click', dropDown1);
divx2.addEventListener('click', dropDown2);
btn6.addEventListener('click', dropDown1);
btn2.addEventListener('click', dropDown2);

function dropDown1() {
        if (div1.classList.contains('hidden')) {
            div1.classList.remove('hidden');
            div1.classList.add('shown');
            up1.style.display = 'none';
            down1.style.display = 'block';
        } else {
            div1.classList.remove('shown');
            div1.classList.add('hidden');
            up1.style.display = 'block';
            down1.style.display = 'none';
        }
}

function dropDown2() {
        if (div2.classList.contains('hidden')) {
            div2.classList.remove('hidden');
            div2.classList.add('shown');
            up2.style.display = 'none';
            down2.style.display = 'block';
        } else {
            div2.classList.remove('shown');
            div2.classList.add('hidden');
            up2.style.display = 'block';
            down2.style.display = 'none';
        }
}
</script>

</html>