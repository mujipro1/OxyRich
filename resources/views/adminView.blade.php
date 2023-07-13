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
                <div class="my-3 col-md-4">
                    <div class='p-4 contlayout'>
                        <h3 class="my-2 mb-4"> Orders </h3>
                        <p class="mx-3 mt-3 mb-2 text-muted"> View orders of today or all orders. </p>
                        <button onclick="window.location.href='/sectors1'" class="myBtn3 m-2">New Order
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="addNewSvg" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M17,12c0,.553-.448,1-1,1h-3v3c0,.553-.448,1-1,1s-1-.447-1-1v-3h-3c-.552,0-1-.447-1-1s.448-1,1-1h3v-3c0-.553,.448-1,1-1s1,.447,1,1v3h3c.552,0,1,.447,1,1Zm7-7v14c0,2.757-2.243,5-5,5H5c-2.757,0-5-2.243-5-5V5C0,2.243,2.243,0,5,0h14c2.757,0,5,2.243,5,5Zm-2,0c0-1.654-1.346-3-3-3H5c-1.654,0-3,1.346-3,3v14c0,1.654,1.346,3,3,3h14c1.654,0,3-1.346,3-3V5Z"/></svg>

                        </button>
                        <button onclick="window.location.href='/viewOrderDetails1'" class="myBtn4 m-2">Today's
                            Orders
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="addNewSvg2" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                        <g>
                            <path d="M320,170.667h139.52c-7.448-19.736-19.019-37.656-33.941-52.565l-74.325-74.368c-14.927-14.905-32.852-26.468-52.587-33.92   v139.52C298.667,161.115,308.218,170.667,320,170.667z"/>
                            <path d="M468.821,213.333H320c-35.346,0-64-28.654-64-64V0.512C252.565,0.277,249.131,0,245.653,0h-96.32   C90.452,0.071,42.737,47.786,42.667,106.667v298.667C42.737,464.214,90.452,511.93,149.333,512h213.333   c58.881-0.07,106.596-47.786,106.667-106.667V223.68C469.333,220.203,469.056,216.768,468.821,213.333z"/>
                        </g>
                        </svg></button>
                        <button onclick="window.location.href='/viewOrderDetails2'" class="myBtn4 m-2">All
                            Orders
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="addNewSvg2" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                        <g>
                            <path d="M320,170.667h139.52c-7.448-19.736-19.019-37.656-33.941-52.565l-74.325-74.368c-14.927-14.905-32.852-26.468-52.587-33.92   v139.52C298.667,161.115,308.218,170.667,320,170.667z"/>
                            <path d="M468.821,213.333H320c-35.346,0-64-28.654-64-64V0.512C252.565,0.277,249.131,0,245.653,0h-96.32   C90.452,0.071,42.737,47.786,42.667,106.667v298.667C42.737,464.214,90.452,511.93,149.333,512h213.333   c58.881-0.07,106.596-47.786,106.667-106.667V223.68C469.333,220.203,469.056,216.768,468.821,213.333z"/>
                        </g>
                        </svg></button>
                        <p class="mx-3 mt-3 mb-2 text-muted"> Admin can add, edit and view all orders. </p>
                    </div>
                </div>
                <div class='col-md-4 my-3'>
                    <div class='p-4 contlayout'>
                        <form action="{{route('adminAuth')}}" method='post'>
                            @CSRF
                            <h3 class="my-2 mb-4"> Customers & Employees </h3>
                            <p class="m-3 text-muted"> Password is required for accessing this information </p>
                            <input name='password' type="password" placeholder="Enter Password" class="form-control m-2"
                                required>
                            <input hidden value='' name='caller' id='caller' class="form-control">
                            <button onclick="setCaller('C')" type='submit' class="myBtn3 m-2">View Customers
                        
                        <svg id="Layer_1" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg" class="addNewSvg">
                            <path d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm6.5 11h-13a1 1 0 0 1 -1-1v-.5a7.5 7.5 0 0 1 15 0v.5a1 1 0 0 1 -1 1zm3.5-15a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm-1.421 2.021a6.825 6.825 0 0 0 -4.67 2.831 9.537 9.537 0 0 1 4.914 5.148h6.677a1 1 0 0 0 1-1v-.038a7.008 7.008 0 0 0 -7.921-6.941z"/></svg>
                        </button>
                            <button onclick="setCaller('E')" class="myBtn4 m-2">View Employees
                        
                        <svg xmlns="http://www.w3.org/2000/svg" id="addNewSvg2" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M3,2.5C3,1.119,4.119,0,5.5,0s2.5,1.119,2.5,2.5-1.119,2.5-2.5,2.5-2.5-1.119-2.5-2.5Zm15.5,2.5c1.381,0,2.5-1.119,2.5-2.5S19.881,0,18.5,0s-2.5,1.119-2.5,2.5,1.119,2.5,2.5,2.5ZM2.418,18.038c-.53-.147-1.084,.156-1.236,.688L.038,22.726c-.152,.53,.156,1.084,.687,1.236,.092,.025,.185,.038,.275,.038,.435,0,.835-.286,.961-.726l1.143-4c.152-.53-.156-1.084-.687-1.236Zm21.543,4.688l-1.143-4c-.151-.531-.705-.835-1.236-.688-.531,.152-.838,.705-.687,1.236l1.143,4c.125,.439,.526,.726,.961,.726,.091,0,.184-.013,.275-.038,.531-.152,.838-.705,.687-1.236Zm-1.824-6.712l-3.138,2.045v4.941c0,.553-.448,1-1,1s-1-.447-1-1v-5.483c0-.338,.171-.653,.454-.838l1.497-.975-1.633-6.115-1.317,2.22v2.691c0,1.379-1.122,2.5-2.5,2.5h-3c-1.378,0-2.5-1.121-2.5-2.5v-2.691l-1.311-2.211-1.589,6.137,1.446,.943c.283,.185,.454,.5,.454,.838v5.483c0,.553-.448,1-1,1s-1-.447-1-1v-4.941l-3.149-2.053C.463,15.129-.252,13.445,.083,11.824l.747-2.761c.36-1.75,1.973-3.063,3.82-3.063,1.376,0,2.666,.735,3.368,1.919l.957,1.614c.423-.329,.948-.533,1.525-.533h3c.577,0,1.102,.204,1.525,.533l.958-1.614c.701-1.184,1.991-1.919,3.367-1.919,1.848,0,3.46,1.313,3.834,3.123l.719,2.642c.349,1.681-.366,3.364-1.766,4.249ZM3.332,14.583l1.692-6.534c-.123-.025-.246-.049-.373-.049-.904,0-1.693,.643-1.875,1.527l-.747,2.761c-.154,.751,.204,1.593,.903,2.034l.401,.261Zm10.668-3.083c0-.275-.224-.5-.5-.5h-3c-.276,0-.5,.225-.5,.5v3c0,.275,.224,.5,.5,.5h3c.276,0,.5-.225,.5-.5v-3Zm7.958,.729l-.719-2.642c-.197-.944-.986-1.587-1.89-1.587-.127,0-.251,.025-.373,.049l1.737,6.505,.344-.224c.711-.449,1.068-1.291,.901-2.102Z"/></svg>
                        </button>
                        </form>
                    </div>
                </div>
                <div class='col-md-4 my-3'>
                    <div class='p-4 contlayout'>
                            @CSRF
                            <h3 class="my-2 mb-4"> Locations </h3>
                            <p class="m-3 text-muted"> Manage Sectors and Subsectors</p>
                            <button onclick="window.location.href='/viewLocations'" class="myBtn3 m-2">View Locations
                                <svg xmlns="http://www.w3.org/2000/svg" class="addNewSvg" viewBox="0 0 24 24" width="512" height="512"><path d="M12,.042a9.992,9.992,0,0,0-9.981,9.98c0,2.57,1.99,6.592,5.915,11.954a5.034,5.034,0,0,0,8.132,0c3.925-5.362,5.915-9.384,5.915-11.954A9.992,9.992,0,0,0,12,.042ZM12,14a4,4,0,1,1,4-4A4,4,0,0,1,12,14Z"/></svg>
                                </button>
                            <button onclick="window.location.href='/addLocations'" class="myBtn4 m-2">Add Location 
                            <svg xmlns="http://www.w3.org/2000/svg" id="addNewSvg2" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M17,12c0,.553-.448,1-1,1h-3v3c0,.553-.448,1-1,1s-1-.447-1-1v-3h-3c-.552,0-1-.447-1-1s.448-1,1-1h3v-3c0-.553,.448-1,1-1s1,.447,1,1v3h3c.552,0,1,.447,1,1Zm7-7v14c0,2.757-2.243,5-5,5H5c-2.757,0-5-2.243-5-5V5C0,2.243,2.243,0,5,0h14c2.757,0,5,2.243,5,5Zm-2,0c0-1.654-1.346-3-3-3H5c-1.654,0-3,1.346-3,3v14c0,1.654,1.346,3,3,3h14c1.654,0,3-1.346,3-3V5Z"/></svg>
                        
                        </button>
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
                                            <th scope="col">Others</th>
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
                                            <td>{{$expense->others}}</td>
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
                                    <label class="form-label"><strong>Others</strong></label>
                                    <label class="form-label">{{$array[5]}}</label>
                                </div>
                            </div>
                            <div class="col-md-8 my-2">
                                <div class="label-select-container">
                                    <label class="form-label"><strong>Total Expenses</strong></label>
                                    <label class="form-label">{{$array[0] + $array[1] + $array[2] + $array[5]}}</label>
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