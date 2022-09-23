<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi waiting list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0FA6A2;
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
        <h1 style="color: black;font-size:1.8rem; font-weight: bolder; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 15%">
            Maaf banget ...
        </h1>

        <h1 style="color: #264c3d;font-size:1.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 55%">
            Reservasi / Dinein / Take away yang kamu pilih sedang tidak tersedia / penuh
        </h1>

        <button style="width: 50%; margin: 6%" type="button" class="btn btn-dark" onclick="location.href='{{ url('syarat-dan-ketentuan') }}'">Kembali</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>