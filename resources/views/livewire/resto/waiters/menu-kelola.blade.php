<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waiters menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div>
                <a class="navbar-brand" href="{{ url()->previous() }}">Back</a>
                <a class="navbar-brand" href="{{ url('waiters-logout') }}">Logout</a>
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
                        <a class="nav-link" href="{{ url('waiters-logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="display: flex; justify-content:center; align-items:center; flex-direction:column; width:100%">

            <h1 style="color: #264c3d;font-size:1.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 10%">Halo {{Auth::user()->name}}
            </h1>
            <h1 style="color: #264c3d;font-size:1.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 10%">Berikut menu yang akan digunakan untuk mengelola antrian : </h1>
            <button style="width: 50%; margin-top: 10%; background-color:#264c3d" type="button" class="btn btn-dark" onclick="location.href='{{ url('reservasi-hari-ini') }}'">Cek Reservasi</button>
            <button style="width: 50%; margin: 3%; " type="button" class="btn btn-light" onclick="location.href='{{ url('antrian-dine-in') }}'">Antrian Dine-in</button>
            <button style="width: 50%; margin: 3%; background-color:#264c3d" type="button" class="btn btn-dark" onclick="location.href='{{ url('antrian-takeaway') }}'">Antrian Take Away</button>
            <button style="width: 50%; margin: 3%; " type="button" class="btn btn-light" onclick="location.href='{{ url('antrian-dine-in') }}'">Order Antrian</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>