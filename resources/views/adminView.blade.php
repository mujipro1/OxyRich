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
        {{Session::forget('fail')}}
        @endif

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        {{Session::forget('success')}}
        @endif


        @if(Session::get('emptyID'))
        <div class="alert alert-danger">
            {{Session::get('emptyID')}}
        </div>
        {{Session::forget('emptyID')}}
        @endif

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav2 navbar-expand-lg"></nav>
            </div>
        </div>


        <div class="container side">
            <div class="row">
                <div class="my-3 col-md-6">
                    <div class='p-4 contlayout'>
                        <h2> Orders </h2>
                        <p class="mx-3 mt-3 mb-2 text-muted"> View orders of today or all orders. </p>
                        <button onclick="window.location.href='/sectors'" class="myBtn3 m-2">Add Order&nbsp |&nbsp +
                        </button>
                        <button onclick="window.location.href='/viewOrderDetails1'" class="myBtn4 m-2">Today's
                            Orders</button>
                        <button onclick="window.location.href='/viewOrderDetails2'" class="myBtn4 m-2">All
                            Orders</button>
                        <p class="mx-3 mt-3 mb-2 text-muted"> Admin can add, edit and view all orders. </p>
                    </div>
                </div>
                <div class='col-md-6 my-3'>
                    <div class='p-4 contlayout'>
                        <form action="{{route('adminAuth')}}" method='post'>
                            @CSRF
                            <h2> Customers & Employees </h2>
                            <p class="m-3 text-muted"> Password is required for accessing this information </p>
                            <input name='password' type="password" placeholder="Enter Password" class="form-control m-2"
                                required>
                            <input hidden value='' name='caller' id='caller' class="form-control">
                            <button onclick="setCaller('C')" type='submit' class="myBtn3 m-2">View Customers</button>
                            <button onclick="setCaller('E')" class="myBtn4 m-2">View Employees</button>
                            <p class="m-3 text-muted"> Admin has the right to add, edit and deactivate users. </p>
                        </form>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-12 my-3">
                    <div class='p-4 contlayout'>
                        <h2> Expenses </h2>
                        <p class="m-3 text-muted"> All expenses of current month</p>

                        <div class='p-4 contlayout' style="min-height:100px;">
                            <div class="table-responsive">
                                <!-- Add a responsive wrapper -->
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Petrol</th>
                                            <th scope="col">Employee</th>
                                            <th scope="col">Filling</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Sales</th>
                                            <th scope="col">Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($expenses as $expense)
                                        <tr>
                                            <td>{{$expense->created_at->format('d-M-Y')}}</td>
                                            <td>{{$expense->petrol_expense}}</td>
                                            <td>{{$expense->employee_wage}}</td>
                                            <td>{{$expense->filling_charges}}</td>
                                            <td>{{$expense->petrol_expense + $expense->employee_wage + $expense->filling_charges}}
                                            </td>
                                            <td>{{$expense->sales}}</td>
                                            <td>{{$expense->sales - ($expense->petrol_expense + $expense->employee_wage + $expense->filling_charges)}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row contlayout p-4 mx-1 mt-4" style="min-height:100px;">
                            <h3 class="mb-4 mt-2 ml-2">Total</h3>
                            <div class="col-md-8 my-2">
                                <div class="label-select-container">
                                    <label class="form-label"><strong>Petrol Expense</strong></label>
                                    <label id='total_bottle_sale' class="form-label">{{$array[0]}}</label>
                                </div>
                            </div>
                            <div class="col-md-8 my-2">
                                <div class="label-select-container">
                                    <label class="form-label"><strong>Employee Wage</strong></label>
                                    <label id='total_bottle_sale' class="form-label">{{$array[1]}}</label>
                                </div>
                            </div>
                            <div class="col-md-8 my-2">
                                <div class="label-select-container">
                                    <label class="form-label"><strong>Filling Charges</strong></label>
                                    <label class="form-label">{{$array[2]}}</label>
                                </div>
                            </div>
                            <div class="col-md-8 my-2">
                                <div class="label-select-container">
                                    <label class="form-label"><strong>Total Expenses</strong></label>
                                    <label class="form-label">{{$array[0] + $array[1] + $array[2]}}</label>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr class="my-4">
                                    </div>
                                </div>


                                <div class="col-md-8 my-2">
                                    <div class="label-select-container">
                                        <label class="form-label"><strong>Total Sales</strong></label>
                                        <label id='total_bottle_sale' class="form-label">{{$array[3]}}</label>
                                    </div>
                                </div>
                                <div class="col-md-8 my-2">
                                    <div class="label-select-container">
                                        <label class="form-label"><strong>Profit</strong></label>
                                        <label id='total_balance_amount' class="form-label">{{$array[4]}}</label>
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

function setCaller(e) {
    document.querySelector("#caller").value = e;
}
</script>

</html>