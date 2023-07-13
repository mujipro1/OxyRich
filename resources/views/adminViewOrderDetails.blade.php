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
                <nav class="navbar nav2 navbar-expand-lg"></nav>
            </div>
        </div>



        <div class="container">
            <div class="row">

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button onclick="window.location.href='/viewOrderDetails2'"
                        class="backBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="812" height="812"><path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z"/></svg>    
                    </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <form action='submitOrder' method="post">
                            @CSRF
                            <h2 class='my-2 mx-4'>Order Details</h2>

                            <div class='customerDetailsOrder'>
                                <table class='table text-muted'>
                                    <tbody>
                                        <tr>
                                            <td class="text-start"> Order ID </td>
                                            <td class="text-start"> {{$order->order_no}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Customer ID </td>
                                            <td class="text-start">{{$order->customer->username}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Customer Name </td>
                                            <td class="text-start"> {{$order->customer->name}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Sector </td>
                                            <td class="text-start"> {{$order->customer->location->sector}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Subsector </td>
                                            <td class="text-start"> {{$order->customer->location->subsector}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Address </td>
                                            <td class="text-start"> {{$order->customer->address}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Order Date </td>
                                            <td class="text-start"> {{$order->created_at->format('d-M-Y H:i:s A')}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Type </td>
                                            <td class="text-start"> {{$order->type}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Emptied Bottles </td>
                                            <td class="text-start"> {{$order->empty_bottles}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Filled Bottles </td>
                                            <td class="text-start"> {{$order->filled_bottles}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Total Amount </td>
                                            <td class="text-start"> {{$order->bill}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Active Bottles </td>
                                            <td class="text-start"> {{$order->customer->active_bottles}} </td>
                                        </tr>   
                                        <tr>
                                            <td class="text-start"> Bill No</td>
                                            <td class="text-start"> {{$order->bill_no}} </td>
                                        </tr>

                                </table>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



        <footer></footer>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/header.js')}}"></script>
</html>