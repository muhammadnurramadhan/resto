<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi Jam Kedatangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f1f1f1;
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
        {{-- <h3>
            {{ $cabang }}</h3> --}}


        <form role="form text-left" method="POST" action="/reservasi-jam-session"
            style="width: 100%; display:flex; justify-content:center; align-items:center; flex-direction:column; margin-top: 25%; margin-bottom: 25%">
            @csrf

            <h4
                style="margin-bottom:5%; display:flex; align-items:center; justify-content:center; text-align:center; font-style:italic">
                Jika merah, waktu / jam yang tersedia tidak bisa diambil untuk reservasi</h4>

            @for ($i = 0; $i < 13; $i++)
                @if ($i % 2 == 0)
                    <div style="display: flex; width: 350px; height: 70px">
                        <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                            name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">{{ $i + 9 }}:00 -
                            +1:00</button>
                    </div>
                @else
                    <div style="display: flex; width: 350px; height: 70px">
                        <button style="width: 100%; margin-top:5%; background-color: #63b8a7" type="submit"
                            name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">{{ $i + 9 }}:00 -
                            +1:00</button>
                    </div>
                @endif


                @if ($cabang[$i] ?? null)
                    <div style="display: flex; width: 350px; height: 70px">
                        <button disabled style="width: 100%; margin-top:5%; background-color: rgb(122, 11, 11)"
                            type="submit" name="waktu_kedatangan" value="15:00 - 16:00"
                            class="btn btn-dark">{{ $cabang[$i]->jam_libur ?? null }} -
                            +1:00 (Jam Tutup / Libur)</button>
                    </div>
                @endif
                {{-- <h3>
            {{ $cabang[$i]->jam_libur ?? null }}</h3> --}}
            @endfor

            {{-- <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                    name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">09:00 - 10:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px;">
                <button style="width: 100%; margin-top:5%; background-color: #63b8a7" type="submit"
                    name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">10:00 - 11:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px;">
                <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                    name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">11:00 - 12:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px;">
                <button style="width: 100%; margin-top:5%; background-color: #63b8a7" type="submit"
                    name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">12:00 - 13:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px;">
                <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                    name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">13:00 - 14:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px;">
                <button style="width: 100%; margin-top:5%; background-color: #63b8a7" type="submit"
                    name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">14:00 - 15:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                    name="waktu_kedatangan" value="15:00 - 16:00" class="btn btn-dark">15:00 - 16:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:2%; background-color: #63b8a7" type="submit"
                    name="waktu_kedatangan" value="16:00 - 17:00" class="btn btn-light">16:00 - 17:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                    name="waktu_kedatangan" value="17:00 - 18:00" class="btn btn-dark">17:00 - 18:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:2%; background-color: #63b8a7" type="submit"
                    name="waktu_kedatangan" value="18:00 - 19:00" class="btn btn-light">18:00 - 19:00</button>
            </div>
            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                    name="waktu_kedatangan" value="19:00 - 20:00" class="btn btn-dark">19:00 - 20:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:2%; background-color: #63b8a7" type="submit"
                    name="waktu_kedatangan" value="20:00 - 21:00" class="btn btn-light">20:00 - 21:00</button>
            </div>
            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:5%; background-color: #264c3d" type="submit"
                    name="waktu_kedatangan" value="21:00 - 22:00" class="btn btn-dark">21:00 - 22:00</button>
            </div>

            <div style="display: flex; width: 350px; height: 70px">
                <button style="width: 100%; margin-top:5%; background-color: #63b8a7" type="submit"
                    name="waktu_kedatangan" value="21:00 - 22:00" class="btn btn-dark">22:00 - 23:00</button>
            </div> --}}

        </form>
        {{-- <button style="width: 100%; margin: 6%" type="button" class="btn btn-dark"
                onclick="location.href='{{ url('reservasi-pembayaran') }}'">Lanjut</button> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
