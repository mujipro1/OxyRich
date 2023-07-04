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
                <nav class="navbar nav3 navbar-expand-lg"></nav>
            </div>
        </div>



        <div class="container">
            <div class="row">

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button onclick="redirectBack()" class="backBtn">
                        < </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <form action="{{route('submitOrder')}}" method="post">
                            @CSRF
                            <h2 class='my-2'>Order Details</h2>

                            <div class='customerDetailsOrder'>
                                <div> Order ID : {{$OrderId}} </div>
                                <div> Customer ID : {{$customer->username}} </div>
                                <div> Customer Name : {{$customer->name}} </div>
                            </div>

                            <input type="hidden" name="order_no" value="{{$OrderId}}">
                            <input type="hidden" name="customer_id" value="{{$customer->username}}">

                            <div class="row">
                                <div class="col-md-6 my-3">
                                    <div class="label-select-container">
                                        <label for="bottletype" class="form-label">Type</label>
                                        <select type="bottletype" name="bottletype" class="form-control">
                                            <option selected value="19L">19L</option>
                                            <option value="6L">6L</option>
                                            <option value="1.5L">1.5L</option>
                                            <option value="0.5L">0.5L</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="label-select-container">
                                        <label for="empty_bottles" class="form-label">Empty Bottles</label>
                                        <input required type="number" name="empty_bottles" id="empty_bottles"
                                            class="form-control my-3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="label-select-container">
                                        <label for="filled_bottles" class="form-label">Filled Bottles</label>
                                        <input required type="number" name="filled_bottles" id="filled_bottles"
                                            class="form-control my-3">
                                    </div>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-6">
                                    <div class="label-select-container">
                                        <label class="form-label">Active Bottles</label>
                                        <label id="active_bottles" class="form-label">{{$customer->active_bottles}}</label>
                                        <input hidden name='active_bottles' id='active_bottlesInput'>
                                    </div>
                                </div>
                            </div>

                            <!-- section seperator -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr class="my-4">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="label-select-container">
                                            <label for="bill" class="form-label">Bill</label>
                                            <input required type="number" name="bill" id="bill"
                                                class="form-control my-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="label-select-container">
                                            <label for="cash" class="form-label">Cash</label>
                                            <input required type="number" name="cash" id="cash"
                                                class="form-control my-3">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <div class="label-select-container">
                                            <label class="form-label">Balance</label>
                                            <label id='balance' class="form-label"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <div class="label-select-container">
                                            <label class="form-label">Total Balance</label>
                                            <label id='total_balance' class="form-label">{{$customer->total_balance}}</label>
                                            <input hidden name='total_balance' id='total_balanceInput'>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <button type='submit' id="submitBtn" class="myBtn mt-4">Next</button>
                                </div>
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
<script>
document.getElementById("dashboard").classList.add("active");

function redirectBack() {
    window.location.href = '/submitSector' + '{{$customer->sector}}' + '_' + '{{$customer->subsector}}';
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('cash').addEventListener('keyup', calculateBalance);
    document.getElementById('bill').addEventListener('keyup', calculateBalance);

    function calculateBalance() {
        var cash = document.getElementById('cash').value;
        var bill = document.getElementById('bill').value;
        var balance = bill - cash;
        document.getElementById('balance').innerHTML = balance;
        document.getElementById('total_balance').innerHTML = {{$customer->total_balance}} + balance;  
        document.getElementById('total_balanceInput').value = {{$customer->total_balance}} + balance;
    }

    filled = document.getElementById('filled_bottles');
    empty = document.getElementById('empty_bottles');
    filled.addEventListener('keyup', calculateActiveBottles);
    empty.addEventListener('keyup', calculateActiveBottles);

    function calculateActiveBottles(){
        var filled_bottles = parseInt(document.getElementById('filled_bottles').value);
        var empty_bottles = parseInt(document.getElementById('empty_bottles').value);
        filled_bottles = filled_bottles ? filled_bottles : 0;
        empty_bottles = empty_bottles ? empty_bottles : 0;

        
        document.getElementById('active_bottles').innerHTML = '';
        document.getElementById('active_bottles').innerHTML = parseInt({{$customer->active_bottles}}) + filled_bottles - empty_bottles;
        document.getElementById('active_bottlesInput').value = parseInt({{$customer->active_bottles}}) + filled_bottles - empty_bottles;
    }
    
});


</script>

</html>