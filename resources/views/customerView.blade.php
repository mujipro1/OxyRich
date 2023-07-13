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
                <nav class="navbar nav4 navbar-expand-lg"></nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="my-3 col-md-12">
                    <div class='p-4 contlayout' style='min-height:16vh;'>
                        <h2 class='px-3'> {{$customer->name}} </h2>
                        <div class='px-4 muted'> Customer </div>
                        <div class='px-4'> {{$customer->phone_no}} </div>
                        <div class='px-4'> {{$customer->address}} </div>
                    </div>
                </div>
                <div class="my-3 col-md-6">
                    <div class='p-4 contlayout'>
                        <h3 class='mb-4'> Details </h3>
                        <p class="text-muted my-2 " >View your personal details, packages , bottle prices </p>
                        <form action="{{route('DetailsCustomer')}}" method="post">
                            @csrf
                            <button class="myBtn3 my-2">Personal Details
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="addNewSvg" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                            <g>
                                <circle cx="256" cy="128" r="128"/>
                                <path d="M256,298.667c-105.99,0.118-191.882,86.01-192,192C64,502.449,73.551,512,85.333,512h341.333   c11.782,0,21.333-9.551,21.333-21.333C447.882,384.677,361.99,298.784,256,298.667z"/>
                            </g>
                            </svg>
                            </button>
                            <p class="text-muted mt-4 my-2 " >View your monthly Orders, Invoices </p>
                        </form>
                        <button onclick="window.location.href='/DetailsOrderCustomer{{$customer->username}}'" class="myBtn4 my-2">Order Details
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="addNewSvg2" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                        <g>
                            <path d="M320,170.667h139.52c-7.448-19.736-19.019-37.656-33.941-52.565l-74.325-74.368c-14.927-14.905-32.852-26.468-52.587-33.92   v139.52C298.667,161.115,308.218,170.667,320,170.667z"/>
                            <path d="M468.821,213.333H320c-35.346,0-64-28.654-64-64V0.512C252.565,0.277,249.131,0,245.653,0h-96.32   C90.452,0.071,42.737,47.786,42.667,106.667v298.667C42.737,464.214,90.452,511.93,149.333,512h213.333   c58.881-0.07,106.596-47.786,106.667-106.667V223.68C469.333,220.203,469.056,216.768,468.821,213.333z"/>
                        </g>
                        </svg>
                    </button>
                    </div>
                </div>
                <div class='col-md-6 my-3'>
                    <div class='p-4 contlayout d-flex justify-content-center'>
                        <img style="height: 330px; width:330px;"
                        src="{{asset('images/Bottles.jpg')}}" class='img-fluid'>
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
</script>

</html>