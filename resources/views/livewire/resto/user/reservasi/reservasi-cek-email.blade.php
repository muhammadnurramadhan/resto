<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Reservasi Pembayaran</title>
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
        <h1
            style="font-weight:bolder ;color: #264c3d;font-size:1.8rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 15%">
            Terima kasih !
        </h1>
        <!-- <h1 style="color: #264c3d;font-size:2rem;">siapa ?</h1> -->

        <h1
            style="color: #264c3d;font-size:1.5rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 10%">
            Reservasi
            kamu sudah
            kami terima.
        </h1>

        <div style="margin-top: 10%;display: flex; text-align:center; align-items:center; justify-content:center;">
            <div class="card" style="width: 90%;"
                style="background-color: #264c3d; display: flex; text-align:center; align-items:center; justify-content:center;">
                <ul class="list-group list-group-flush"
                    style="background-color: #264c3d; display: flex; align-items:center; justify-content:center;">
                    <li class="list-group-item"
                        style="background-color: #264c3d; display: flex; align-items:center; justify-content:center;">
                        <h1
                            style="color: #f1f1f1;font-size:1.0rem; font-style:italic; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 3%">
                            <b> Status Pembayaran </b> : {{ Auth::user()->status_message }}
                        </h1>
                    </li>
                    <li class="list-group-item" style="background-color: #264c3d; display: flex">
                        <h1
                            style="color: #f1f1f1;font-size:1.0rem; font-style:italic; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center;">
                            <b> Jumlah Pembayaran </b> : {{ Auth::user()->gross_amount }}
                        </h1>
                    </li>
                    <li class="list-group-item" style="background-color: #264c3d; display: flex">
                        <h1
                            style="color: #f1f1f1;font-size:1.0rem; font-style:italic; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center;">
                            <b>Transaksi id</b> : {{ Auth::user()->transaction_id }}
                        </h1>
                    </li>
                    <li class="list-group-item" style="background-color: #264c3d; display: flex">
                        <h1
                            style="color: #f1f1f1;font-size:1.0rem; font-style:italic; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center;">
                            <b>Order id</b> : {{ Auth::user()->order_id }}
                        </h1>
                    </li>
                </ul>
            </div>
        </div>

        <h1
            style="color: #264c3d;font-size:1.1rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 10%">
            Cek Email atau WA kamu ya..
        </h1>

        <button style="width: 50%; margin: 6%" type="button" class="btn btn-dark"
            onclick="location.href='{{ url('/') }}'">Kembali</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
{{-- 081319572669 --}}