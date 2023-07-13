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

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button
                        onclick="window.location.href='/customer{{$customer->username}}'" class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="812" height="812"><path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z"/></svg>
                    </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <form action='submitOrder' method="post">
                            @CSRF
                            <h3 class='my-2 mx-4'>Personal Details</h3>

                            <div class='customerDetailsOrder'>

                                <table class='table text-muted'>
                                    <tbody>
                                        <tr>
                                            <td class="text-start"> Name </td>
                                            <td class="text-start"> {{$customer->name}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Customer ID </td>
                                            <td class="text-start">{{$customer->username}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Phone Number </td>
                                            <td class="text-start">{{$customer->phone_no}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Sector / Area </td>
                                            <td class="text-start"> {{$customer->location->subsector}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Address </td>
                                            <td class="text-start"> {{$customer->address}} </td>
                                        </tr>
                                    </tbody>
                                </table>

                              

                                <h3 class='my-4 mt-5 text-dark'>Bottle Details</h3>
                                <table class='table text-muted'>
                                    <tbody>
                                        <tr>
                                            <td class="text-start"> Bottle Type </td>
                                    <td class="text-start"> {{$customer->bottle_type}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Bottle Price </td>
                                            <td class="text-start"> {{$customer->bottle_price}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Active Bottles </td>
                                            <td class="text-start"> {{$customer->active_bottles}} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-start"> Total Bottles Bought </td>
                                            <td class="text-start"> {{$customer->no_of_bottles}} </td>
                                        </tr>

                                        <tr>
                                            <td class="text-start"> Bottles Security Paid </td>
                                            <td class="text-start"> {{$customer->total_bottle_security}} </td>
                                        </tr>

                                        @if($customer->dispenser == 1)
                                        <tr>
                                            <td class="text-start"> Total Dispensers Bought </td>
                                            <td class="text-start"> {{$customer->no_of_dispenser}} </td>
                                        </tr>

                                        <tr>
                                            <td class="text-start"> Dispensers Security Paid </td>
                                            <td class="text-start"> {{$customer->total_dispenser_security}} </td>
                                        </tr>
                                        @endif
                                    </tbody>
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