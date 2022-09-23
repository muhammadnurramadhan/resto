<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi hari ini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        <div style="display: flex; justify-content:center; align-items:center; flex-direction:column; width:100%">
            <h1
                style="color: rgb(33, 33, 33);font-size:1.8rem; font-weight: bolder; padding-left: 10%; padding-right:10%; padding-bottom: 10%; text-align:center; align-items:center; justify-content:center; margin-top: 10%">
                Reservasi Hari Ini</h1>
            <div style="display: flex; width: 90%" class="table-responsive">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col" style="">Jam kedatangan</th>
                            <th scope="col" style="">No</th>
                            <th scope="col" style="">Nama tamu</th>
                            <th scope="col" style="">Jumlah orang</th>
                            <th scope="col" style="">Contact</th>
                            <th scope="col" style="">Hadir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $item)
                            <tr>
                                <td style="color: #f1f1f1; font-style:italic">{{$item->jam_kedatangan}}</th>
                                <td style="color: #f1f1f1; font-style:italic">{{$item->id}}</td>
                                <td style="color: #f1f1f1; font-style:italic">{{$item->nama}}</td>
                                <td style="color: #f1f1f1; font-style:italic">{{$item->jumlah_orang}}</td>
                                <td style="color: #f1f1f1; font-style:italic">{{$item->nohp}} &nbsp;&nbsp;<i class="bi bi-whatsapp" style="background-color:green; color:white"></i></td>
                                <td style="color: #f1f1f1; font-style:italic">{{$item->status_kehadiran}}&nbsp;&nbsp;<i class="bi bi-check-circle-fill"></i></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-outline-light" style="margin-top: 5%;" onclick="location.href='{{ url('reservasi-export') }}'"><i
                    class="bi bi-cloud-arrow-down-fill"></i>&nbsp; Download</button>
            {{-- <button style="width: 50%; margin: 10%; background-color:#264c3d" type="button" class="btn btn-dark"
                onclick="location.href='{{ url('waiters-antrian') }}'">Lanjut</button> --}}

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
