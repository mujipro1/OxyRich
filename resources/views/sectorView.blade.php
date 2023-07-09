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

        @if($id == 1)
        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav2 navbar-expand-lg"></nav>
            </div>
        </div>
        @elseif($id == 2)
        <div class="container pb-5">
            <div class="row">
                <nav class="navbar nav3 navbar-expand-lg"></nav>
            </div>
        </div>

        @endif

        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        {{Session::forget('fail')}}
        @endif

        <div class="container">
            <div class="row">

                <div class="col-md-1 offset-md-1 pl-5 mt-4"><button onclick="redirectToEmployee()" class="backBtn">
                        < </button>
                </div>
                <div class="my-4 col-md-8">
                    <div class="contlayout p-4">
                        <form action="{{route('submitSector')}}" method="post">
                            @CSRF
                            <h2 class='my-2'>Place Order</h2>

                            <div class="label-select-container">
                                <label for="sector" class="form-label">Choose Sector</label>
                                <select name="sector" id="sector" class="form-control my-3">
                                    <option value="Select Sector" disabled selected>Select Sector</option>
                                    @foreach ($locations->unique('sector') as $location)
                                    <option value="{{ $location->sector }}">{{ $location->sector }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="label-select-container">
                                <label for="subsector" id="subLabel" class="muted form-label">Choose Subsector</label>
                                <select disabled name="subsector" id="subsector" class="form-control my-3">
                                    <option value="Select Subsector" disabled selected>Select Subsector</option>
                                </select>
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


                            <div class="d-flex justify-content-center">
                                <button type='submit' id="submitBtn" class="myBtn2 mt-4">Next</button>
                            </div>

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
function redirectToEmployee() {
    @if($id == 2)
    window.location.href = "{{route('employee', ['employee' => $employee])}}";
    @elseif($id == 1)
    window.location.href = "{{route('admin', ['admin' => $admin])}}";
    @endif
}
</script>

</html>