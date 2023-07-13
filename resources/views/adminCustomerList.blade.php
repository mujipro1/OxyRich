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
                    @if($id == 1)
                    <div class="modal-body">
                        Are you sure you you want to deactivate Customer?
                    </div>
                    @else
                    <div class="modal-body">
                        Are you sure you you want to deactivate Employee?
                    </div>
                    @endif
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
                    @if ($id == 1)
                    <div class="modal-body">
                        Are you sure you you want to activate Customer?
                    </div>
                    @else
                    <div class="modal-body">
                        Are you sure you you want to activate Employee?
                    </div>
                    @endif
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
                <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="812" height="812"><path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z"/></svg>
            </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>
                        <div class="d-flex my-3 justify-content-between align-items-center">
                        @if($id == 1)    
                            <h2 class="d-inline">Customers</h2>
                        @else
                            <h2 class="d-inline">Employees</h2>
                            </div>
                        @endif

                        @if($id == 1)
                            <button onclick="redirectToNewCustomer()" class="myBtn5">Add New
                            <svg xmlns="http://www.w3.org/2000/svg" id="addNewSvg2" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M17,12c0,.553-.448,1-1,1h-3v3c0,.553-.448,1-1,1s-1-.447-1-1v-3h-3c-.552,0-1-.447-1-1s.448-1,1-1h3v-3c0-.553,.448-1,1-1s1,.447,1,1v3h3c.552,0,1,.447,1,1Zm7-7v14c0,2.757-2.243,5-5,5H5c-2.757,0-5-2.243-5-5V5C0,2.243,2.243,0,5,0h14c2.757,0,5,2.243,5,5Zm-2,0c0-1.654-1.346-3-3-3H5c-1.654,0-3,1.346-3,3v14c0,1.654,1.346,3,3,3h14c1.654,0,3-1.346,3-3V5Z"/></svg>
                         </button>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                                <form action="{{route('searchCustomer')}}" method="post">
                                    @csrf
                                    <div class="d-flex align-items-center">
                                        <p class="m-2 text-muted">Search</p>
                                        <input type="text" placeholder="Search" name="search" class="form-control">
                                        <button class="myBtn6" type='submit' name='searchBtn'>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="search"
                                                x="0px" y="0px" viewBox="0 0 513.749 513.749"
                                                style="enable-background:new 0 0 513.749 513.749;" xml:space="preserve"
                                                width="512" height="512">
                                                <g>
                                                    <path
                                                        d="M504.352,459.061l-99.435-99.477c74.402-99.427,54.115-240.344-45.312-314.746S119.261-9.277,44.859,90.15   S-9.256,330.494,90.171,404.896c79.868,59.766,189.565,59.766,269.434,0l99.477,99.477c12.501,12.501,32.769,12.501,45.269,0   c12.501-12.501,12.501-32.769,0-45.269L504.352,459.061z M225.717,385.696c-88.366,0-160-71.634-160-160s71.634-160,160-160   s160,71.634,160,160C385.623,314.022,314.044,385.602,225.717,385.696z" />
                                                </g>
                                            </svg>
                                        </button>
                                        <button class="myBtn6" name="refreshBtn" type='submit'>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="refresh"
                                                x="0px" y="0px" viewBox="0 0 511.494 511.494"
                                                style="enable-background:new 0 0 511.494 511.494;" xml:space="preserve"
                                                width="512" height="512">
                                                <g>
                                                    <path
                                                        d="M478.291,255.492c-16.133,0.143-29.689,12.161-31.765,28.16c-15.37,105.014-112.961,177.685-217.975,162.315   S50.866,333.006,66.236,227.992S179.197,50.307,284.211,65.677c35.796,5.239,69.386,20.476,96.907,43.959l-24.107,24.107   c-8.33,8.332-8.328,21.84,0.004,30.17c4.015,4.014,9.465,6.262,15.142,6.246h97.835c11.782,0,21.333-9.551,21.333-21.333V50.991   c-0.003-11.782-9.556-21.331-21.338-21.329c-5.655,0.001-11.079,2.248-15.078,6.246l-28.416,28.416   C320.774-29.34,159.141-19.568,65.476,86.152S-18.415,353.505,87.304,447.17s267.353,83.892,361.017-21.828   c32.972-37.216,54.381-83.237,61.607-132.431c2.828-17.612-9.157-34.183-26.769-37.011   C481.549,255.641,479.922,255.505,478.291,255.492z" />
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @endif

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout'>
                                    <div class="table-responsive">
                                        <!-- Add a responsive wrapper -->
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    @if($id == 1)
                                                    <th scope="col">CNIC</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Subsector</th>
                                                    <th scope="col">View/Edit</th>
                                                    <th scope="col">Deactivate</th>
                                                    @else
                                                    <th scope="col">CNIC</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Deactivate</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($id == 1)
                                                @foreach($customers as $customer)
                                                <tr>
                                                    @if($customer->is_active)
                                                    <td>{{$customer->username}}</td>
                                                    <td>{{$customer->name}}</td>
                                                    <td>{{$customer->phone_no}}</td>
                                                    <td>{{$customer->location->sector}}</td>
                                                    <td>{{$customer->location->subsector}}</td>
                                                    @else
                                                    <td class="muted">{{$customer->username}}</td>
                                                    <td class="muted">{{$customer->name}}</td>
                                                    <td class="muted">{{$customer->phone_no}}</td>
                                                    <td class="muted">{{$customer->location->sector}}</td>
                                                    <td class="muted">{{$customer->location->subsector}}</td>
                                                    @endif

                                                    <td><button onclick="redirectToEdit({{$customer->username}})"
                                                            class="myBtn4">View</button>
                                                    </td>

                                                    <!-- Button trigger modal -->
                                                    @if($customer->is_active)
                                                    <td><button type="button"
                                                            class="btn btn-danger btnWidth deactivateBtn"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            data-customerid="{{$customer->username}}" data-userType="C">
                                                            Deactivate
                                                        </button></td>
                                                    @else
                                                    <td><button type="button"
                                                            class="btn btn-success btnWidth activateBtn"
                                                            data-toggle="modal" data-target="#exampleModal2"
                                                            data-customerid="{{$customer->username}}" data-userType="C">
                                                            Activate
                                                        </button></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                @else
                                                @foreach($employees as $employee)
                                                <tr>
                                                    @if($employee->is_active)
                                                    <td>{{$employee->username}}</td>
                                                    <td>{{$employee->name}}</td>
                                                    <td>{{$employee->phone_no}}</td>
                                                    @else
                                                    <td class="muted">{{$employee->username}}</td>
                                                    <td class="muted">{{$employee->name}}</td>
                                                    <td class="muted">{{$employee->phone_no}}</td>
                                                    @endif


                                                    <!-- Button trigger modal -->
                                                    @if($employee->is_active)
                                                    <td><button type="button"
                                                            class="btn btn-danger btnWidth deactivateBtn"
                                                            data-toggle="modal" data-target="#exampleModal"
                                                            data-customerid="{{$employee->username}}" data-userType="E">
                                                            Deactivate
                                                        </button></td>
                                                    @else
                                                    <td><button type="button"
                                                            class="btn btn-success btnWidth activateBtn"
                                                            data-toggle="modal" data-target="#exampleModal2"
                                                            data-customerid="{{$employee->username}}" data-userType="E">
                                                            Activate
                                                        </button></td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                                @endif
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
function redirectToEdit(customerId) {
    window.location.href = '/editCustomer' + customerId;
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
        var type = this.getAttribute('data-userType');
        modal = document.querySelector('#exampleModal');
        var deleteBtn = modal.querySelector('.deactivate-Btn');
        deleteBtn.addEventListener('click', function() {
            if(type == 'C'){
                window.location.href = '/deactivateCustomer' + customerId;
            }
            else{
                window.location.href = '/deactivateEmployee' + customerId;
            }
        });
    });
});

document.querySelectorAll('.activateBtn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var customerId = this.getAttribute('data-customerid');
        var type = this.getAttribute('data-userType');
        modal = document.querySelector('#exampleModal2');
        var deleteBtn = modal.querySelector('.activate-Btn');
        console.log(deleteBtn);
        deleteBtn.addEventListener('click', function() {
            if(type == 'C'){
                window.location.href = '/activateCustomer' + customerId;
            }
            else{
                window.location.href = '/activateEmployee' + customerId;
            }
        });
    });
});
</script>

</html>