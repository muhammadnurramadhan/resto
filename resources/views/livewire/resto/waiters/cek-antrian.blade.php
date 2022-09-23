<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Antrian Dine-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #63b8a7;
        }

        hr.line1 {
            border: 3px solid #3C3C3C;
            border-radius: 5px;
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
            <!-- {{ url()->previous() }} -->
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

        <div style="display: flex; justify-content:center; align-items:center; flex-direction:column; width:100%">

            <h1
                style="color: #3C3C3C;font-size:2rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 4%; font-weight:bolder">
                CEK</h1>
            <h1
                style="color: #3C3C3C;font-size:2rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 1%; font-weight:bolder">
                Antrian Dine in</h1>

            {{-- <p>Cari data pelanggan :</p>
            <form action="cari-antrian-takeaway" method="GET">
                <input type="text" name="cari" placeholder="Cari .." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
            </form> --}}

            <div style="display:flex; justify-content:center; align-items:center; width: 100%; margin-top: 3%">
                <form class="form-inline" action="cari-antrian-dinein" method="GET">
                    <div class="form-group mx-sm-3 mb-2"
                        style="display:flex; justify-content:center; align-items:center; width: 25rem">
                        <input type="text" class="form-control" id="cari" name="cari" value="{{ old('cari') }}" placeholder="Cari data">
                    </div>

                    <div style="display:flex; justify-content:center; align-items:center; width: 100%; margin-top:10%;">
                        <button type="submit" class="btn btn-outline-light mb-2" style="height: 60px">Cari data customer</button>
                    </div>
                </form>
            </div>

            {{-- <div class="container">
                <h1
                    style="font-weight:300;color: #3C3C3C;font-size:1.5rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 7%; margin-bottom: 3%; font-weight:bolder">
                    Cari</h1>
            </div> --}}



            {{-- <hr width="30%" style="background-color:black; color: black; height: 3px"> --}}

            <div class="container"
                style="display: flex; justify-content:center; align-items:center; flex-direction:column; margin-bottom:2%; margin-top: 5%;">
                <h1
                    style="font-weight:300;color: #3C3C3C;font-size:1.6rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; font-weight:bolder">
                    Hasil Pencarian</h1>
                <h1
                    style="color: #0FA6A2;font-size:2.2rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; font-weight:bolder">
                    {{ $data_cari != null ? $data_cari[0]->nama : 'Nama' }}</h1>

                <h1
                    style="font-weight:300;color: #3C3C3C;font-size:1.6rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 3%; font-weight:bolder">
                    Jumlah Orang</h1>
                <h1
                    style="color: #0FA6A2;font-size:2.2rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; font-weight:bolder">
                    {{ $data_cari != null ? $data_cari[0]->jumlah_orang : 'Jumlah orang' }}</h1>

                <h1
                    style="font-weight:300;color: #3C3C3C;font-size:1.6rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 3%; font-weight:bolder">
                    No antrian</h1>
                <h1
                    style="color:#3C3C3C;font-size:4.2rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; font-weight:bolder">
                    {{ $data_cari != null ? $data_cari[0]->antrian_sekarang : 'No antrian' }}</h1>
            </div>

            <div style="display: flex; flex-direction:row; margin-top: 1%; width: 100%">
                <div style="display: flex; width: 100%; align-items:center; justify-content:center">

                    <div
                        style="display: flex; flex-direction:row; align-items:center; justify-content:center; margin-right: 15%">
                        <h1
                            style="color: #264c3d;font-size:1.6rem; padding-left: 5%; padding-right:5%; padding-bottom: 10%; text-align:center; align-items:center; justify-content:center; margin-top: 1%; font-weight:normal">
                            Total Antrian</h1>
                        <h1
                            style="color: #264c3d;font-size:2rem; padding-left: 5%; padding-right:5%; padding-bottom: 10%; text-align:center; align-items:center; justify-content:center; margin-top: 1%; font-weight:bolder">
                            {{ $count }}</h1>
                    </div>

                    <div style="display: flex; flex-direction:row; align-items:center; justify-content:center">
                        <h1
                            style="color: #264c3d;font-size:1.6rem; padding-left: 5%; padding-right:5%; padding-bottom: 10%; text-align:center; align-items:center; justify-content:center; margin-top: 1%; font-weight:normal">
                            Dipanggil</h1>
                        <h1
                            style="color: #264c3d;font-size:2rem; padding-left: 5%; padding-right:5%; padding-bottom: 10%; text-align:center; align-items:center; justify-content:center; margin-top: 1%; font-weight:bolder">
                            {{ DB::table('antrian_dine_ins')->latest('id')->first()->panggilan }}</h1>
                    </div>

                </div>
            </div>

            <button style="width: 50%; margin-bottom: 5%; margin-top:3%" type="button" class="btn btn-dark"
                onclick="location.href='{{ url()->previous() }}'">Kembali</button>
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
