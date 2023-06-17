<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/order.css')}}" rel="stylesheet">
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
        <!-- order.blade.php -->
    <form class="container" action="/submit-order" method="POST">
        @csrf
        
    <div class="ver-div"> 
        <label class="label"  for="filled_bottles">Filled Bottles:</label>
        <input class="input-group" type="text" id="filled_bottles" name="filled_bottles" required>
        
        <label class="label" for="remaining_bottles">Remaining Bottles:</label>
        <input class="input-group" type="text" id="remaining_bottles" name="remaining_bottles" required>

        <label class="label" for="balance">Balance:</label>
        <input class="input-group" type="text" id="balance" name="balance" required>
    </div>

    <div class="ver-div">
        <label class="label" for="emptied_bottles">Emptied Bottles:</label>
        <input class="input-group" type="text" id="emptied_bottles" name="emptied_bottles" required>
       
        <label class="label" for="cash">Cash:</label>
        <input class="input-group" type="text" id="cash" name="cash" required>
        
        <label class="label" for="total">Total:</label>
        <input class="input-group" type="text" id="total" name="total" required>
    </div>

        <button class="btn2" type="submit">Submit Order</button>
    </form>

    
    <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script>
document.getElementById("dashboard").classList.add("active");
</script>

</html>