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

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        {{Session::forget('success')}}
        @endif

        <div class="container side">
            <div class='row'>

                <div class="col-md-1 mt-4"><button onclick="redirectToAdmin()" class="backBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="812" height="812"><path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z"/></svg>    
            </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>
                        <h2> Orders </h2>
                        @if($id == 2)
                        <form action="{{route('adminViewOrder', ['admin' => $admin])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 mt-3 d-flex align-items-center">
                                    <p class="m-2 text-muted dateLbl" style="width:60px;">Date</p>
                                    <input id='date' name='date' type="date" class="form-control">
                                </div>

                                <div class="col-md-3 mt-3 d-flex align-items-center">
                                    <p class="m-2 text-muted">Orders</p>
                                    <select class="form-select" name="asc" aria-label="Default select example">
                                        <option selected value="2">Descending</option>
                                        <option value="1">Ascending</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-3 d-flex align-items-center">
                                    <p class="m-2  constant-width text-muted">Search</p>
                                    <input type="text" name="search" placeholder="Search" class="form-control">

                                    <button class="myBtn6" type='submit' name='searchBtn'>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="search" x="0px"
                                            y="0px" viewBox="0 0 513.749 513.749"
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
                            </div>
                        </form>
                        @endif

                        @if($id == 1)
                        <form action="{{route('adminView2Order', ['admin' => $admin])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mt-3 d-flex align-items-center">
                                    <p class="m-2  constant-width text-muted">Search</p>
                                    <input type="text" name="search" placeholder="Search" class="form-control">

                                    <button class="myBtn6" type='submit' name='searchBtn'>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="search" x="0px"
                                            y="0px" viewBox="0 0 513.749 513.749"
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
                            </div>
                        </form>
                        @endif

                        @if ($id == 1)
                        <div class="text-muted mx-2">Date : {{date('d-M-Y')}}</div>
                        @endif

                        <div class='row'>
                            <div class="col-md-12 my-2 mt-5">
                                <div class='p-4 contlayout' style="min-height: 100px;">
                                    <div class="table-responsive">
                                        <!-- Add a responsive wrapper -->
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date/Time</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Empty Bottles</th>
                                                    <th scope="col">Filled Bottles</th>
                                                    <th scope="col">Bill</th>
                                                    <th scope="col">Cash</th>
                                                    <th scope="col">Balance</th>
                                                    <!-- <th scope="col">Sector</th>
                                                    <th scope="col">Subsector</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- check if orders exist -->
                                                @if($orders->count() == 0)
                                                <tr>
                                                    <td colspan="9" class="text-center">
                                                        <h5 class="my-4 muted">No orders found</h5>
                                                    </td>
                                                </tr>
                                                @endif
                                                @foreach($orders as $order)
                                                <tr onclick="redirectToOrderDetails({{$order->order_no}})">
                                                    @if ($id == 1)
                                                    <td>{{ $order->created_at->format('H:i:s A') }}</td>
                                                    @else
                                                    <td>{{ $order->created_at->format('d-M-Y H:i:s A') }}</td>
                                                    @endif

                                                    <td>{{$order->customer->name}}</td>
                                                    <td>{{$order->empty_bottles}}</td>
                                                    <td>{{$order->filled_bottles}}</td>
                                                    <td>{{$order->bill}}</td>
                                                    <td>{{$order->cash}}</td>
                                                    <td>{{$order->balance}}</td>
                                                    <!-- <td>{{$order->customer->sector}}</td>
                                                    <td>{{$order->customer->subsector}}</td> -->

                                                </tr>
                                                @endforeach
                                                <!-- Add more table rows here if needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row contlayout p-4 mx-1 mt-4" style="min-height:100px;">
                                    <h4 class="mb-4 mt-2 ml-2">Summary</h4>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Total Bottles Sale</strong></label>
                                            <label id='total_bottle_sale'
                                                class="form-label">{{intval($total_bottle_sales)}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Total Cash Received</strong></label>
                                            <label id='total_balance_amount'
                                                class="form-label">{{intval($total_cash_received)}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Total Balance Amount</strong></label>
                                            <label id='total_balance_amount'
                                                class="form-label">{{$total_sale_amount - $total_cash_received}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Total Sales Amount</strong></label>
                                            <label id='total_sale_amount'
                                                class="form-label">{{intval($total_sale_amount)}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Total Empty Bottles</strong></label>
                                            <label id='total_empty_bottles'
                                                class="form-label">{{intval($total_empty_bottles)}}</label>
                                        </div>
                                    </div>

                                    @if($id == 1)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr class="my-4">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <form action="{{route('submit-expenses')}}" method='post'>
                                            @csrf
                                            <h4 class='mb-3'>Expenses</h4>
                                            <div class="row">

                                                <div class=" col-md-6 my-2 d-flex align-items-center">
                                                    <label for="petrol"
                                                        class="form-label constant-width2 mx-3 mt-2">Petrol
                                                        Expense</label>
                                                    @if ($expense)
                                                    <input id="petrol" type="number" name="petrol_expense"
                                                        value="{{$expense->petrol_expense}}" class="form-control" required>
                                                    @else
                                                    <input id="petrol" type="number" name="petrol_expense"
                                                        class="form-control" required>
                                                    @endif
                                                </div>

                                                <div class=" col-md-6 my-2 d-flex align-items-center">
                                                    <label for="emp_wage"
                                                        class="form-label constant-width2 mx-3 mt-2">Employee
                                                        Wage</label>

                                                    @if ($expense)
                                                    <input id="emp_wage" type="number" name="employee_wage"
                                                        value="{{$expense->employee_wage}}" class="form-control" required>
                                                    @else
                                                    <input id="emp_wage" type="number" name="employee_wage"
                                                        class="form-control" required>
                                                    @endif
                                                </div>

                                                <div class=" col-md-6 my-2 d-flex align-items-center">
                                                    <label for="bottle_filling_charges"
                                                        class="form-label constant-width2 mx-3 mt-2">Filling
                                                        Charges</label>
                                                    @if ($expense)
                                                    <input id="bottle_filling_charges" type="number"
                                                        value="{{$expense->filling_charges}}"
                                                        name="bottle_filling_charges" class="form-control" required>
                                                    @else
                                                    <input id="bottle_filling_charges" type="number"
                                                        name="bottle_filling_charges" class="form-control" required>
                                                    @endif
                                                </div>
                                                
                                                <div class=" col-md-6 my-2 d-flex align-items-center">
                                                    <label for="others"
                                                        class="form-label constant-width2 mx-3 mt-2">Others
                                                        </label>

                                                    @if ($expense)
                                                    <input id="others" type="number" name="others"
                                                        value="{{$expense->others}}" class="form-control" required>
                                                    @else
                                                    <input id="others" type="number" name="others"
                                                        class="form-control" required>
                                                    @endif
                                                </div><br>
                                            </div>

                                            <div class="my-3 d-flex align-items-center justify-content-center">
                                                <button class="myBtn5 saveBtn" type='submit' name='addBtn'>Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
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