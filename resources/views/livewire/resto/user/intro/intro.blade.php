<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intro Page</title>
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
            src="{{ asset('assets/img/resto/intro/intro.PNG') }}" class="intro">
        <h1 style="color: #264c3d;font-size:3rem;">Selamat</h1>
        <h1 style="color: #264c3d;font-size:3rem;">datang di</h1>

        <img width="45%" class="img-fluid" src="{{ asset('assets/img/resto/intro/xfoods.png') }}" class="intro">
        <h1 style="font-size:1.2rem; color:#f1f1f1; font-weight:300">Xperience for Foods!</h1>
        {{-- <div style="margin-top: 5%; display: flex; justify-content:center; align-items:center; flex-direction:column">
            {{ $url_resto }}
            <p style="color:darkolivegreen; font-style:italic; margin-top:2%">Scan qr-code untuk akses / tekan lanjut</p>
        </div> --}}
        <form role="form text-left" method="POST" action="/resto-session">
            @csrf
            <div style="display: flex; justify-content:center; align-items:center; width: 100%;">
                <button class="btn btn-dark"
                    style="width: 250px; margin-top: 10%; margin-bottom: 10%; display: flex; align-items: center; justify-content:center"
                    type="submit" class="btn btn-dark">Lanjut</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
