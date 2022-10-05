<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waiters Antrian Dine-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #63b8a7;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #366C57;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #264c3d;
        }
    </style>
</head>

<body class="body">
    <div style="display: flex; width: 100%; flex-direction: column">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 5%; padding-right:5%">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div>
                <a class="navbar-brand" href="{{ url()->previous() }}">Back</a>
                <a class="navbar-brand" href="{{ url('waiters-login') }}">Logout</a>
            </div> --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('waiters-edit-profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('waiters-password') }}">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('waiters-login') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="display: flex; justify-content:center; align-items:center; flex-direction:column; width:100%; margin-bottom: 10%">
            <h1
                style="color: #264c3d;font-size:2rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 10%; font-weight:bolder">
                Antrian Dine-in <i>( {{ $status_dinein }} )</i></h1>

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h1
                            style="color: #264c3d;font-size:1.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 15%">
                            Total Antrian</h1>
                        <h1
                            style="color: #264c3d;font-size:4.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 5%; font-weight:bolder">
                            {{ $count }}</h1>

                    </div>
                    <div class="col-sm">
                        <h1
                            style="color: #264c3d;font-size:1.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 15%">
                            Dipanggil</h1>
                        <h1
                            style="color: #264c3d;font-size:4.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 5%; font-weight:bolder">
                            {{ $total_panggilan }}</h1>
                    </div>
                </div>
            </div>

            <button style="width: 50%; margin-top: 8%;" type="button" class="btn btn-light"
                onclick="location.href='{{ url('panggilan-antrian-dinein') }}'">Panggil
                Antrian</button>
            <button style="width: 50%; margin-top: 3%;" type="button" class="btn btn-light"
                onclick="location.href='{{ url('cari-antrian-dinein') }}'">Cek Antrian</button>
                <button style="width: 50%; margin-top: 3%;" type="button" class="btn btn-success"
                    onclick="location.href='{{ url('start-antrian-dinein') }}'">Start Antrian</button>
            <button style="width: 50%; margin-top: 3%;" type="button" class="btn btn-warning"
                onclick="location.href='{{ url('pause-antrian-dinein') }}'">Pause Antrian</button>
                
                <button style="width: 50%; margin-top: 3%;" type="button" class="btn btn-danger"
                onclick="location.href='{{ url('stop-antrian-dinein') }}'">Stop Antrian</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
