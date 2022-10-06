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
        <h3
            style="color: #264c3d;font-size:1.5rem; padding-left: 10%; padding-right:10%; text-align:center; align-items:center; justify-content:center; margin-top: 10%">
            Konfirmasi reservasi
            kamu dulu ya sebelum
            melakukan
            pembayaran biaya
            reservasi.
        </h3>
        <!-- <h1 style="color: #264c3d;font-size:2rem;">siapa ?</h1> -->

        <div style="display: flex; justify-content: center; align-items:center; width: 25rem; margin-top: 5%">
            <div class="card text-white bg-dark mb-3" style="max-width: 25rem; width: 100%">
                <div class="card-header">
                    <h3>Data Pelanggan</h3>
                </div>
                <div class="card-body">
                    <div style="margin: 5%">
                        <h5 class="card-title">Nama</h5>
                        <p class="card-text" style="font-style: italic">&nbsp;{{ Auth::user()->name }}</p>
                    </div>

                    <div style="margin: 5%; margin-top: 10%">
                        <h5 class="card-title">Email</h5>
                        <p class="card-text" style="font-style: italic">&nbsp;{{ Auth::user()->email }}</p>
                    </div>

                    <div style="margin: 5%; margin-top: 10%">
                        <h5 class="card-title">Whatsapp</h5>
                        <p class="card-text" style="font-style: italic">&nbsp;{{ Auth::user()->phone }}</p>
                    </div>
                    <div style="margin: 5%; margin-bottom: 10%">
                        <h5 class="card-title">Meja | id</h5>
                        <p class="card-text" style="font-style: italic">&nbsp;{{ Auth::user()->id }}</p>
                    </div>
                    <div style="margin: 5%; margin-bottom: 10%">
                        <h5 class="card-title">Fee yang akan dibayar</h5>
                        <p class="card-text" style="font-style: italic">&nbsp;Rp.{{ $cabang->fee }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="form-check" style="display: flex; justify-content:center; align-items:center; text-align:center; width:70%; margin-top: 10%">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 9%;margin: 3%">
            <label class="form-check-label" for="flexCheckDefault">
                Saya setuju untuk syarat & ketentuan yang
                berlaku terkait layanan ini.
            </label>
        </div> --}}
        <form role="form text-left" method="POST" action="/reservasi-pembayaran-session"
            style="width: 100%; display:flex; justify-content:center; align-items:center; flex-direction:column; margin-bottom: 5%">
            @csrf
            <div class="form-check form-check-info text-left"
                style="display: flex; justify-content:center; align-items:center; text-align:center; width:70%; margin-top: 5%">
                <input class="form-check-input" type="checkbox" name="reservasi_konfirmasi_pembayaran"
                    id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault" style="margin-left: 5%">
                    Saya setuju untuk syarat & ketentuan yang berlaku terkait layanan ini.
                </label>
                @error('reservasi_konfirmasi_pembayaran')
                    <p class="text-danger text-xs mt-2">First, agree to the Terms and Conditions, then try register again.
                    </p>
                @enderror
            </div>

            <button style="width: 50%; margin: 2%" type="submit" class="btn btn-dark" onclick="location.href='{{ url('reservasi-pembayaran') }}'">Lanjut</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
