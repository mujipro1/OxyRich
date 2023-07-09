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


        @if(Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{Session::get('error')}}
        </div>
        {{Session::forget('error')}}
        @endif


        <div class="container">
            <div class="row">

                <div class="col-md-1 pl-5 mt-4"><button onclick="window.location.href='/CustomerList'" class="backBtn">
                        < </button>
                </div>
                <div class="my-4 col-md-10">
                    <div class="contlayout container p-4">
                        <h2 class='m-2 mb-4'>New Customer</h2>
                        <form id='form' action="{{route('submitNewCustomer')}}" method="post">
                            @CSRF

                            <p class='muted mx-3'> Personal Information </p>
                            <div class="row">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="name" class="form-label constant-width mx-3 mt-2">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Full Name"
                                        required>
                                </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="username" class="form-label constant-width mx-3 mt-2">CNIC</label>
                                    <input type="text" id='cnic-input' name="username" class="form-control"
                                        placeholder="00000-0000000-0" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="email" class="form-label constant-width mx-3 mt-2">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="abc@xyz.com">
                                </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="phone" class="form-label constant-width mx-3 mt-2">Phone</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="03123456789"
                                        maxlength="11" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="sector" class="form-label constant-width mx-3 mt-2">Sector</label>
                                    <select name="sector" id="sector" class="text-muted form-control" required>
                                        <option disabled value="Select Sector" disabled selected>Select Sector</option>
                                        @foreach ($sectors as $sector)
                                        <option value="{{ $sector->sector }}">{{ $sector->sector }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="subsector" id="subLabel"
                                        class="muted form-label constant-width mx-3 mt-2">SubSector</label>
                                    <select name="subsector" id="subsector" class="text-muted form-control" required>
                                        <option value="Select Subsector" disabled selected>Select Subsector</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="my-2 col-md-12 d-flex align-items-center">
                                    <label for="address"
                                        class="form-label constant-width mx-2 px-2 mt-2">Address</label>
                                    <input type="text" name="address" class="form-control"
                                        placeholder="St-10 G-6/4 Islamabad" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="my-2 col-md-12 d-flex align-items-center">
                                    <label for="description"
                                        class="form-label constant-width mx-2 px-2 mt-2">Description</label>
                                    <textarea name="description" class="form-control"
                                        style="height: 80px;resize: none;"></textarea>
                                </div>
                            </div>

                            <p class='muted mt-5 mx-3'> Set up a Password </p>

                            <div class="row">
                                <div class=" col-md-6 d-flex align-items-center">
                                    <label for="password" class="form-label constant-width mx-3 mt-2">Password</label>
                                    <input id="password" type="password" name="password" class="form-control"
                                        placeholder="Password" required>
                                </div>
                                <div class=" col-md-6 d-flex align-items-center">
                                    <label for="confirmPassword" class="form-label constant-width mx-3 mt-2">Confirm
                                        Password</label>
                                    <input type="password" id="confirmPassword" name="confirmPassword"
                                        class="form-control" placeholder="Confirm Password" required>
                                </div>
                                <div class='mx-3 error2'></div>
                                <div class='mx-3 error'></div>
                            </div>

                            <!-- section seperator -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr class="my-4">
                                    </div>
                                </div>

                                <p class='muted m-3'> Bottle Details</p>

                                <div class="row">
                                    <div class="my-2 col-md-6 d-flex align-items-center">
                                        <label for="bottletype" class="form-label constant-width mx-3 mt-2">Type</label>
                                        <select type="bottletype" name="bottletype" class="form-control">
                                            <option selected value="19L">19L</option>
                                            <option value="12L">12L</option>
                                            <option value="6L">6L</option>
                                        </select>
                                    </div>
                                    <div class="my-2 col-md-6 d-flex align-items-center">
                                        <label for="price" class="form-label constant-width mx-3 mt-2">Price</label>
                                        <input type="number" name="price" class="form-control"
                                            placeholder='Per Bottle Price' required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="my-2 col-md-6 d-flex align-items-center">
                                        <label for="security"
                                            class="form-label constant-width mx-3 mt-2">Security</label>
                                        <input type="number" id='security' name="security" class="form-control"
                                            placeholder="Per Bottle Security" required>
                                    </div>
                                    <div class="my-2 col-md-6 d-flex align-items-center">
                                        <label for="noofbottles" class="form-label constant-width mx-3 mt-2">No. of
                                            Bottles</label>
                                        <input type="number" id='noofbottles' name="noofbottles" class="form-control"
                                            placeholder="No. of Bottles" required>
                                    </div>
                                </div>

                                <p class='mx-3 muted totalSec'>Total Security :</p>

                                <!-- section seperator -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr class="my-4">
                                        </div>
                                    </div>


                                    <p class='muted  m-3'> Dispenser Details</p>

                                    <div class="row">
                                        <div class="my-2 col-md-4 d-flex align-items-center">
                                            <label for="dispenser"
                                                class="form-label constant-width mx-3 mt-2">Dispenser</label>
                                            <select name="dispenser" id='dispenser' class="form-control">
                                                <option selected value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="my-2 col-md-4 d-flex align-items-center">
                                            <label for="securityD"
                                                class="muted form-label dsec constant-width mx-3 mt-2">Security</label>
                                            <input disabled type="number" id='securityD' name="securityD"
                                                class="muted form-control" placeholder="Per Dispenser">
                                        </div>
                                        <div class="my-2 col-md-4 d-flex align-items-center">
                                            <label for="noofDispensers"
                                                class="muted form-label dnodisp constant-width mx-3 mt-2">No. of
                                                Dispensers</label>
                                            <input disabled type="number" id='noofDispensers' name="noofDispensers"
                                                class="muted form-control" placeholder="">
                                        </div>
                                    </div>

                                    <p class='mx-3 muted totalDSec'>Total Security :</p>


                                    <div class='text-center'>
                                        <button type="submit" class="myBtn5 my-5 ">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <script>
        // Get the sector and subsector options
        let sectorOptions = document.querySelector('#sector');
        let subsectorOptions = document.querySelector('#subsector');

        sectorOptions.addEventListener('change', function() {
            subsectorOptions.innerHTML = '';
            let selectedSector = this.value;
            let subsectors = @json($locations -> groupBy('sector'));

            if (subsectors[selectedSector]) {
                subsectors[selectedSector].forEach(function(location) {
                    let option = document.createElement('option');
                    option.text = location.subsector;
                    option.value = location.subsector;
                    subsectorOptions.add(option);
                });
                subsectorOptions.disabled = false;
            } else {
                subsectorOptions.disabled = true;
            }
        });

        document.getElementById('subLabel').classList.remove('muted');
        </script>


        <footer></footer>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/header.js')}}"></script>
<script src="{{asset('js/newCustomer.js')}}"></script>
</html>