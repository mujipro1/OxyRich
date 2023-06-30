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


        <div class="container side">
            <div class="row">
                <div class="col-md-1 m-4"><button onclick="window.location.href='/CustomerList'" 
                class="backBtn"><</button></div>
                <div class="my-3 ml-3 col-md-8">
                        <div class='p-4 mx-3 contlayout'>
                        <form action="{{route('saveCustomerChanges')}}" method="post">
                            @CSRF
                            <h2> Customer Details</h2>
                            <button onclick='enableEdit()' class="myBtn4 my-2">Edit</button><br>
                            <input type="hidden" name="username" value="{{$customer->username}}">
                            <label for="username" class="form-label mx-3 mt-3">CNIC : {{$customer->username}}</label><br>
                            <label for="name" class="form-label mx-3 mt-3">Name</label>
                            <input disabled type="text" value="{{$customer->name}}" name='name' class="form-control" required>
                            <label for="email" class="form-label mx-3 mt-3">Email</label>
                            <input disabled type="email" name='email' value="{{$customer->email}}" class="form-control" required>
                            <label for="phone" class="form-label mx-3 mt-3">Phone</label>
                            <input disabled type="number" name='phone' value="{{$customer->phone_no}}" class="form-control" required>
                            <label for="address" class="form-label mx-3 mt-3">Address</label>
                            <input disabled type="text" name='address' value="{{$customer->address}}"
                                class="form-control" required>
                        <div class='text-center'><button type="submit" id="saveBtn" class="myBtn mt-4" disabled>Save</button></div>
                        </form>

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

function enableEdit() {
    inputs = document.getElementsByTagName('input');
    for (i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
    document.getElementsByClassName('myBtn4')[0].disabled = true;
    document.getElementById('saveBtn').disabled = false;
}
</script>

</html>