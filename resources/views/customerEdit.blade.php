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
                <div class="col-md-1 my-4"><button onclick="window.location.href='/CustomerList'" class="backBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="812" height="812"><path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z"/></svg>
                </button>
                </div>
                <div class="my-3 ml-3 col-md-10">
                    <div class='p-4 mx-3 container contlayout'>
                        <form action="{{route('saveCustomerChanges')}}" method="post">
                            @CSRF
                            <h2> Customer Details</h2>
                            <button onclick='enableEdit()' id='editBtn' class="myBtn4 my-2">Edit</button><br>

                            <div class="row">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label class="form-label constant-width mx-3 mt-3">CNIC</label>
                                    <label id='cnic-input'
                                        class="form-label mt-3">{{$customer->username}}</label>
                                    <input hidden value="{{$customer->username}}" name="username">
                                    </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="name" class="form-label constant-width mx-3 mt-3">Name</label>
                                    <input disabled type="text" value="{{$customer->name}}" name='name'
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="email" class="form-label constant-width mx-3 mt-3">Email</label>
                                    <input disabled type="email" name='email' value="{{$customer->email}}"
                                        class="form-control" required>
                                </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="phone" class="form-label constant-width mx-3 mt-3">Phone</label>
                                    <input disabled type="tel" name='phone' value="{{$customer->phone_no}}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="sector" class="form-label constant-width mx-3 mt-2">Sector</label>
                                    <select disabled name="sector" id="sector" class="specialSector text-muted form-control" required>
                                        <option value="{{$customer->location->sector}}" selected>{{$customer->location->sector}}</option>
                                        @foreach($locations->unique('sector') as $location)
                                            @if($location->sector !== $customer->location->sector)
                                            <option value="{{$location->sector}}">{{$location->sector}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="subsector" id="subLabel"
                                        class="muted form-label constant-width mx-3 mt-2">SubSector</label>
                                    <select disabled name="subsector" id="subsector" class="specialSubsector text-muted form-control" required>
                                        <option value="{{$customer->location->subsector}}" selected>{{$customer->location->subsector}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="address" class="form-label constant-width mx-3 mt-3">Address</label>
                                    <input disabled type="text" name='address' value="{{$customer->address}}"
                                        class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="my-2 col-md-12 d-flex align-items-center">
                                    <label for="description"
                                        class="form-label constant-width mx-2 px-2 mt-2">Description</label>
                                    <textarea disabled name="description" class="form-control"
                                        style="height: 80px;resize: none;">{{$customer->description}}</textarea>
                                </div>
                            </div>

                            <div class='text-center'><button type="submit" id="saveBtn" class="myBtn mt-4"
                                    disabled>Save</button></div>
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
                selectedSector = this.value;
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
<script src="{{asset('js/header.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>

function enableEdit() {
    inputs = document.getElementsByTagName('input');
    
    for (i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }

    textarea = document.getElementsByTagName('textarea');
    for (i = 0; i < textarea.length; i++) {
        textarea[i].disabled = false;
    }

    drops = document.getElementsByTagName('select');
    for (i = 0; i < drops.length; i++) {
        drops[i].disabled = false;
    }

    document.getElementsByClassName('myBtn4')[0].disabled = true;
    document.getElementById('saveBtn').disabled = false;
}
</script>

</html>