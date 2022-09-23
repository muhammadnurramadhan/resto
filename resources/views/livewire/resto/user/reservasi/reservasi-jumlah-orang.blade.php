<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi Jumlah Orang</title>
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
    <div style="display: flex; justify-content:center; align-items:center; flex-direction:column">
        <img style="margin-top: 3%; margin-bottom: 10%" width="70%" class="img-fluid"
            src="{{ asset('assets/img/resto/reservasi/reservasi.PNG') }}" class="intro">
        <h1
            style="color: #264c3d;font-size:1.6rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center">
            Di Outlet maksimal 4
            orang permeja, kamu
            datang berapa orang?
        </h1>


        <form role="form text-left" method="POST" action="/reservasi-jumlah-session"
            style="width: 100%; display:flex; justify-content:center; align-items:center; flex-direction:column; margin-bottom: 10%">
            @csrf

            <button type="submit" name="jumlah_kedatangan" value="2"
                style="width: 60%; margin-top:5%; background-color: #264c3d" type="button" class="btn btn-dark">2
                Orang</button>
            <button type="submit" name="jumlah_kedatangan" value="4" style="width: 60%; margin-top:2%"
                type="button" class="btn btn-light">4 Orang</button>
        </form>

        {{-- <button style="width: 60%; margin: 6%" type="button" class="btn btn-dark"
            onclick="location.href='{{ url('reservasi-jam-kedatangan') }}'">Lanjut</button> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
