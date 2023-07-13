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

                <div class="col-md-1 mt-4"><button onclick="window.location.href='/customer{{$customer->username}}'"
                        class="backBtn">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="812" height="812"><path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z"/></svg>
                    </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>
                        <h2>Monthly Orders </h2>
                        <form action="{{route('DetailsOrderCustomer', ['customerId' => $customer->username])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 mt-3 d-flex align-items-center">
                                    <p class="m-2 text-muted dateLbl" style="width:60px;">Month</p>
                                    <input id='date' name='date' type="month" class="form-control">
                                
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

                                </div>
                                <h4 class="text-muted mt-4 mx-2" >{{$month}}</h4>
                            </div>
                        </form>

                        <div class='row'>
                            <div class="col-md-12 my-2">
                                <div class='p-4 contlayout'>
                                    <div class="table-responsive">
                                        <!-- Add a responsive wrapper -->
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Bottle</th>
                                                    <th scope="col">Filled </th>
                                                    <th scope="col">Returned </th>
                                                    <th scope="col">Bill</th>
                                                    <th scope="col">Paid</th>
                                                    <th scope="col">Balance</th>
                                                    <!-- <th scope="col">Sector</th>
                                                    <th scope="col">Subsector</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->created_at->format("d-M-Y")}}</td>
                                                    <td>{{$order->type}}</td>
                                                    <td>{{$order->filled_bottles}}</td>
                                                    <td>{{$order->empty_bottles}}</td>
                                                    <td>{{$order->bill}}</td>
                                                    <td>{{$order->cash}}</td>
                                                    <td>{{$order->balance}}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                @if ($id == 1)
                                <div class="row contlayout p-4 mx-1 mt-4" style="min-height:100px;">
                                    <h4 class="mb-4 mt-2 ml-2">Summary</h4>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Bottles In Use</strong></label>
                                            <label id='total_bottle_sale'
                                                class="form-label">{{$customer->active_bottles}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Total Bill</strong></label>
                                            <label id='total_balance_amount'
                                                class="form-label">{{$monthly_bill}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="label-select-container">
                                            <label class="form-label"><strong>Total Balance</strong></label>
                                            <label id='total_balance_amount'
                                                class="form-label">{{$monthly_balance}}</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
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

</html>