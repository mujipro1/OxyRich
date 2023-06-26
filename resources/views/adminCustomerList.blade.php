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

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif        

                                     
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure you you want to delete Customer?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete-btn">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav2 navbar-expand-lg"></nav>
            </div>
        </div>



        <div class="container side">
            <div class='row'>

                <div class="col-md-1 mt-4"><button onclick="window.location.href='/admin'" class="backBtn">
                        < </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>
                        <h2> Customers </h2>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="m-2 text-muted">Sort By</p>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1" selected>Name</option>
                                    <option value="2">Email</option>
                                    <option value="3">Phone</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p class="m-2 text-muted">Orders</p>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected value="1">Ascending</option>
                                    <option value="2">Descending</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p class="m-2 text-muted">Search</p>
                                <input type="text" placeholder="Search" class="form-control">
                            </div>
                        </div>

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout'>
                                    <div class="table-responsive">
                                        <!-- Add a responsive wrapper -->
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">View/Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>23</td>
                                                    <td>Ali Khan</td>
                                                    <td>0300-1234567</td>
                                                    <td>alikhan@gmail.com</td>
                                                    <td><button onclick="redirectToEdit(1)" class="myBtn3">View</button>
                                                    </td>
                                                    <!-- Button trigger modal -->
                                                    <td><button type="button" class="myBtn3 delBtn" data-toggle="modal"
                                                            data-target="#exampleModal" data-customerid="2">
                                                            Delete
                                                        </button></td>
                                               </tr>
                                                <!-- Add more table rows here if needed -->
                                            </tbody>
                                        </table>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{asset('js/header.js')}}"></script>
<script>
document.getElementById("dashboard").classList.add("active");

function redirectToEdit(customerId) {
    window.location.href = '/customerEdit' + customerId;
}

document.querySelectorAll('.delBtn').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var customerId = this.getAttribute('data-customerid');
    modal = document.querySelector('#exampleModal');
    var deleteBtn = modal.querySelector('.delete-btn');
    console.log(deleteBtn);
    deleteBtn.addEventListener('click', function() {
        window.location.href = '/deleteCustomer' + customerId;
        });
});
});



</script>

</html>