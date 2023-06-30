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

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav2 navbar-expand-lg"></nav>
            </div>
        </div>


        <div class="container side">
            <div class='row'>

                <div class="col-md-1 mt-4"><button onclick="redirectToAdmin()" class="backBtn">
                        < </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>
                        <h2> Orders </h2>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="m-2 text-muted">Sort By</p>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1" selected>Name</option>
                                    <option value="2">Email</option>
                                    <option value="3">Phone</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p class="m-2 text-muted">Orders</p>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected value="1">Ascending</option>
                                    <option value="2">Descending</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p class="m-2 text-muted">Search</p>
                                <input type="text" placeholder="Search" class="form-control">
                            </div>
                        </div>

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout'>
                                    <div class="table-responsive">
                                        <!-- Add a responsive wrapper -->
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date/Time</th>
                                                    <th scope="col">Customer ID</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr onclick="redirectToOrderDetails({{$order->order_no}})">
                                                    <td>{{$order->order_date}}</td>
                                                    <td>{{$order->username}}</td>
                                                    <td>{{$order->customer->name}}</td>
                                                    <td>{{$order->total_amount}}</td>
                                               </tr>
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
<script src="{{asset('js/header.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("dashboard").classList.add("active");
function redirectToAdmin() {
    // redirect to route
    window.location.href = "{{route('admin', ['admin' => $admin])}}";
}

function redirectToOrderDetails(orderId) {
    // redirect to route
    window.location.href = "{{ url('/orderDetails') }}" + orderId;
}
</script>

</html>
