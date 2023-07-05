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
        {{Session::forget('success')}}}
        @endif


        <!--Deactivate  Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deactivaton</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure you you want to deactivate Customer?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger deactivate-Btn">Deactivate</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activate Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Activation</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure you you want to activate Customer?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success activate-Btn">Activate</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

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
                        <div class="d-flex my-3 justify-content-between align-items-center">
                            <h2 class="d-inline">Customers</h2>
                            <button onclick="redirectToNewCustomer()" class="myBtn5">Add New | &nbsp+ </button>
                        </div>
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
                                                    <th scope="col">CNIC</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Subsector</th>
                                                    <th scope="col">View/Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($customers as $customer)
                                                <tr>
                                                    @if($customer->is_active)
                                                    <td>{{$customer->username}}</td>
                                                    <td>{{$customer->name}}</td>
                                                    <td>{{$customer->phone_no}}</td>
                                                    <td>{{$customer->sector}}</td>
                                                    <td>{{$customer->subsector}}</td>
                                                    @else
                                                    <td class="muted">{{$customer->username}}</td>
                                                    <td class="muted">{{$customer->name}}</td>
                                                    <td class="muted">{{$customer->phone_no}}</td>
                                                    <td class="muted">{{$customer->sector}}</td>
                                                    <td class="muted">{{$customer->subsector}}</td>
                                                    @endif

                                                    <td><button onclick="redirectToEdit({{$customer->username}})"
                                                            class="myBtn4">View</button>
                                                    </td>

                                                    <!-- Button trigger modal -->
                                                    @if($customer->is_active)
                                                    <td><button type="button"
                                                            class="btn btn-danger btnWidth deactivateBtn"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            data-customerid="{{$customer->username}}">
                                                            Deactivate
                                                        </button></td>
                                                    @else
                                                    <td><button type="button"
                                                            class="btn btn-success btnWidth activateBtn"
                                                            data-toggle="modal" data-target="#exampleModal2"
                                                            data-customerid="{{$customer->username}}">
                                                            Activate
                                                        </button></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                <!-- Add more table rows here if needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </button>
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
document.getElementById("dashboard").classList.add("active");

function redirectToEdit(customerId) {
    window.location.href = '/customerEdit' + customerId;
}

function redirectToAdmin() {
    // redirect to route
    window.location.href = "{{route('admin', ['admin' => $admin])}}";
}

function redirectToNewCustomer() {
    window.location.href = "{{route('AddNewCustomer')}}";
}

document.querySelectorAll('.deactivateBtn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var customerId = this.getAttribute('data-customerid');
        modal = document.querySelector('#exampleModal');
        var deleteBtn = modal.querySelector('.deactivate-Btn');
        console.log(deleteBtn);
        deleteBtn.addEventListener('click', function() {
            window.location.href = '/deactivateCustomer' + customerId;
        });
    });
});

document.querySelectorAll('.activateBtn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var customerId = this.getAttribute('data-customerid');
        modal = document.querySelector('#exampleModal2');
        var deleteBtn = modal.querySelector('.activate-Btn');
        console.log(deleteBtn);
        deleteBtn.addEventListener('click', function() {
            window.location.href = '/activateCustomer' + customerId;
        });
    });
});
</script>

</html>