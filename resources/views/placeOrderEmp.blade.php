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

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button onclick="window.location.href='/placeOrder'"
                        class="backBtn">
                        < </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <form method="post">
                            @CSRF
                        <h2 class='my-2'>Order Details</h2>

                        <div class='customerDetailsOrder'>
                        <div> Order ID : 12121231 </div>
                        <div> Customer ID : 12121231 </div>
                        <div> Customer Name : Ali Khan </div>
                        </div>
                        <div class="label-select-container">
                            <label for="filled_bottles" class="form-label">Filled Bottles</label>
                            <input type="number" name="filled_bottles" id="filled_bottles" class="form-control my-3">
                        </div>
                    
                        <div class="label-select-container">
                            <label for="remaining_bottles" class="form-label">Remaining Bottles</label>
                            <input type="number" name="remaining_bottles" id="remaining_bottles" class="form-control my-3">
                        </div>
                        
                        <div class="label-select-container">
                            <label for="emptied_bottles" class="form-label">Emptied Bottles</label>
                            <input type="number" name="emptied_bottles" id="emptied_bottles" class="form-control my-3">
                        </div>

                        <div class="label-select-container">
                            <label for="balance" class="form-label">Balance</label>
                            <input type="number" name="balance" id="balance" class="form-control my-3">
                        </div>

                        <div class="label-select-container">
                            <label for="cash" class="form-label">Cash</label>
                            <input type="number" name="cash" id="cash" class="form-control my-3">
                        </div>

                        <div class="label-select-container">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" name="total" id="total" class="form-control my-3">
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <button type='submit' id="submitBtn" class="myBtn mt-4">Next</button>
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
</script>

</html>