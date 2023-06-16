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


        <div class="container side">
            <div class="row">
                <div class="my-3 offset-md-2 col-md-8">
                    <div class='p-4 mx-3 contlayout'>
                        <h2> Customer Details</h2>
                        <button onclick='enableEdit()' class="myBtn4 my-2">Edit</button><br>
                        <label for="name" class="form-label mx-3 mt-3">Name</label>
                        <input disabled type="text" placeholder="Ali Khan" name='name' class="form-control">
                        <label for="email" class="form-label mx-3 mt-3">Email</label>
                        <input disabled type="email" name='email' placeholder="alikhan@gmail.com" class="form-control">
                        <label for="phone" class="form-label mx-3 mt-3">Phone</label>
                        <input disabled type="number" name='phone' placeholder="03123912399" class="form-control">
                        <label for="address" class="form-label mx-3 mt-3">Address</label>
                        <input disabled type="text" name='address' placeholder="St 10 G-10/4 Islamabad"
                            class="form-control">
                        <div class='text-center'><button class=" myBtn mt-4">Save Changes</button>
                            <button class="myBtn2 mt-4">Cancel</button>
                        </div>

                        </>
                    </div>
                </div>
            </div>
            </div>


            <footer></footer>
        </div>

</body>
<script src="{{asset('js/header.js')}}"></script>
<script>
document.getElementById("dashboard").classList.add("active");

function enableEdit() {
    inputs = document.getElementsByTagName('input');
    for (i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
    document.getElementsByClassName('myBtn4')[0].disabled = true;
}
</script>

</html>