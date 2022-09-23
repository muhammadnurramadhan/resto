<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Email</title>
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
    <div style="display: flex; justify-content:center; align-items:center; flex-direction:column">
        <img style="margin-top: 3%; margin-bottom: 10%" width="70%" class="img-fluid" src="{{ asset('assets/img/resto/reservasi/reservasi.PNG') }}" class="intro">
        <h1 style="color: #264c3d;font-size:1.8rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center">
            Boleh tau email
            kamu ya
        </h1>
        <!-- <h1 style="color: #264c3d;font-size:2rem;">siapa ?</h1> -->

        {{-- <div class="form-group" style="margin-top: 10%;">
            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Alamat Email">
        </div> --}}

        <form role="form text-left" method="POST" action="/reservasi-email-session">
            @csrf
            <div class="form-group" style="margin-top: 10%;">
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Email">
            </div>

            <div style="display: flex; justify-content: center; align-items:center;margin-top:10%; margin-bottom: 10%">
                <button style="width: 50%; margin: 6%" type="submit" class="btn btn-dark">Konfirmasi</button>
            </div>
        </form>

        {{-- <button style="width: 50%; margin: 6%" type="button" class="btn btn-dark" onclick="location.href='{{ url('reservasi-jumlah-orang') }}'">Lanjut</button> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>