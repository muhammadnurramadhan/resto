<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email send</title>
</head>

<body>
    <div>
        <div>
            Email notifikasi foods
        </div>
        <div>
            Hello <strong>{{ $name }}</strong>,
            <p>{{ $body }}</p>

        </div>

        <div>
            {{-- <ul class="list-group list-group-flush"
            style="background-color: #264c3d; display: flex; align-items:center; justify-content:center;"> --}}
            {{-- <li class="list-group-item" --}}
            {{-- style="background-color: #264c3d; display: flex; align-items:center; justify-content:center;"> --}}
            <p>
                <b> Status Pembayaran </b> : {{ Auth::user()->status_message }}
            </p>
            </li>
            {{-- <li class="list-group-item" style="background-color: #264c3d; display: flex"> --}}
            <p>
                <b> Jumlah Pembayaran </b> : {{ Auth::user()->gross_amount }}
            </p>
            {{-- </li> --}}
            {{-- <li class="list-group-item" style="background-color: #264c3d; display: flex"> --}}
            <p>
                <b>Transaksi id</b> : {{ Auth::user()->transaction_id }}
            </p>
            {{-- </li> --}}
            {{-- <li class="list-group-item" style="background-color: #264c3d; display: flex"> --}}
            <p>
                <b>Order id</b> : {{ Auth::user()->order_id }}
            </p>
            {{-- </li> --}}
            {{-- </ul> --}}

            <div>Segera lakukan pembayaran ya, terimakasih</div>
        </div>
    </div>
</body>

</html>
