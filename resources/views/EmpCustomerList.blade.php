<html>

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

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        {{Session::forget('success')}}
        @endif

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav3 navbar-expand-lg"></nav>
            </div>
        </div>



        <div class="container side">
            <div class='row'>

                <div class="col-md-1 mt-4"><button onclick="window.location.href='/sectors'" class="backBtn">
                        < </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>
                        <h2> Customers </h2>
                        <div class="mx-3 mt-2">Sector = {{$sector}}</div>
                        <div class="mx-3 ">Subsector = {{$subsector}}</div>

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout'>
                                    <div class="table-responsive">

                                        
                                        <!-- Add a responsive wrapper -->
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sr.</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">New Order</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($customers as $customer)
                                                @if($customer->is_active)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$customer->name}}</td>
                                                    <td>{{$customer->address}}</td>
                                                    <td><button onclick="redirectToOrder({{$customer->username}})" class="myBtn4">Order</button>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                <!-- Add more table rows here if needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <footer></footer>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{asset('js/header.js')}}"></script>
<script>
function redirectToOrder(customerId) {
    window.location.href = '/placeOrder' + customerId;
}
</script>

</html>