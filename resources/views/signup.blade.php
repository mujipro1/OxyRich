<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="{{asset('css/header.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div class="c1">
        <div class="container pb-5">
            <div class="row">
                <nav class="navbar navbar-expand-lg"></nav>
            </div>
        </div>

        <section>
            <div class='container'>
                <div class='row crow py-1'>
                    <div class='col-md-6 my-3 side2'>
                        <form action="{{route('submit-form')}}" method='post'>
                            <h3 class='pt-4 greet mt-3'>Sign Up</h3>
                            <p class='pb-3 greet'>Sign up and create your account</p>
                            <div class='px-4'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <input type='name' placeholder="First Name" name='fname' class='form-control' />
                                    </div>
                                    <div class='col-md-6'>
                                        <input type='name' placeholder="Last Name" name='lname' class='form-control' />
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-md-6'>
                                        <input type='email' placeholder="Email" name='email' class='form-control' />
                                    </div>
                                    <div class='col-md-6'>
                                        <input type='phone' placeholder="Phone" name='phone' class='form-control' />
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-md-6'>
                                        <input type='password' placeholder="Password" name='password'
                                            class='form-control' />
                                    </div>
                                    <div class='col-md-6'>
                                        <input type='password' placeholder="Password Confirm" name='rpassword'
                                            class='form-control' />
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-md-12'>
                                        <input type='address' placeholder="Address" name='address'
                                            class='form-control' />
                                    </div>
                                </div>

                                <button type='submit' class='btn loginBtn mt-4 btn-primary'>Sign Up</button>
                            </div>
                        </form>
                    </div>
                    <div class='col-md-6 my-3 side1'>
                        <div class='blurrCard'>
                            <span>Sign Up</span> with us to register
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer></footer>
    </div>

</body>
<script src="{{asset('js/header.js')}}"></script>

</html>