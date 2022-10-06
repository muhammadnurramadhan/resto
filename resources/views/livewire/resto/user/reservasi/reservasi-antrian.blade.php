<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi & Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .body_intro {
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

<body class="body_intro">
    <div style="display: flex; justify-content:center; align-items:center; flex-direction:column">
        <h1 style="color: #63b8a7;font-size:1.3rem; margin-top: 10%">Reservasi & Antrian</h1>
        <h1 style="color: #264c3d;font-size:1.6rem; text-align:center">{{ Auth::user()->pilih_cabang }}</h1>
        <h1
            style="display: flex; align-items:center; text-align:center; justify-content:center; color: #264c3d;margin-top:5%; margin-bottom: 5%; font-size:1rem; padding-left: 10%; padding-right: 10%; font-weight: 300">
            kamu bisa pilih mau reservasi atau mau
            datang langsung dengan antrian disini ya</h1>
        <!-- kamu bisa pilih mau reservasi atau mau
datang langsung dengan antrian disini ya -->

        <form role="form text-left" method="POST" action="/reservasi-antrian-session">
            @csrf
            <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-top:1%">
                @foreach ($status_reservasi as $item)
                    @if ($item->status_reservasi == 'aktif')
                        <button class="btn btn-light" type="submit" name="pilih_jenis_reservasi" value='RESERVASI'
                            class="btn btn-dark">
                            <div class="card-body" style="background-color: #63b8a7;">
                                <h5 class="card-title"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color:#264c3d">
                                    RESERVASI</h5>
                                <p class="card-text"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color: #264c3d;margin-top:10%">
                                    Reservasi hanya bisa dilakukan H-1
                                    sebelum kedatangan dengan melakukan
                                    pembayaran reservasi dimuka Rp.
                                    minimal DP,- yang akan dipotong
                                    dari transaksi saat dine in
                                </p>
                            </div>
                        </button>
                    @else
                        <button disabled class="btn btn-light" type="submit" name="pilih_jenis_reservasi"
                            value='RESERVASI' class="btn btn-dark">
                            <div class="card-body" style="background-color: #63b8a7;">
                                <h5 class="card-title"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color:#264c3d">
                                    RESERVASI</h5>
                                <p class="card-text"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color: #264c3d;margin-top:10%">
                                    Reservasi hanya bisa dilakukan H-1
                                    sebelum kedatangan dengan melakukan
                                    pembayaran reservasi dimuka Rp.
                                    minimal DP,- yang akan dipotong
                                    dari transaksi saat dine in
                                </p>
                            </div>
                        </button>
                    @endif
                @endforeach

            </div>
        </form>

        {{-- {{$status_dinein}} --}}

        <form role="form text-left" method="POST" action="/waitinglist-antrian-session">
            @csrf
            <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-top:1%">
                @foreach ($status_dinein as $item)
                    @if ($item->status_dinein == 'aktif')
                        <button class="btn btn-light" type="submit" name="pilih_jenis_reservasi" value='WAITING LIST'
                            class="btn btn-dark">
                            <div class="card-body" style="background-color: #264c3d;">
                                <h5 class="card-title"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center">
                                    WAITING
                                    LIST</h5>
                                <p class="card-text"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center;margin-top:10%">
                                    Walkin dapat dilakukan dihari yang sama,
                                    tanpa diminta pembayaran dimuka!</p>
                            </div>
                        </button>
                    @else
                        <button disabled class="btn btn-light" type="submit" name="pilih_jenis_reservasi"
                            value='WAITING LIST' class="btn btn-dark">
                            <div class="card-body" style="background-color: #264c3d;">
                                <h5 class="card-title"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center">
                                    WAITING
                                    LIST</h5>
                                <p class="card-text"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center;margin-top:10%">
                                    Walkin dapat dilakukan dihari yang sama,
                                    tanpa diminta pembayaran dimuka!</p>
                            </div>
                        </button>
                    @endif
                @endforeach

            </div>
        </form>

        <form role="form text-left" method="POST" action="/reservasi-antrian-session">
            @csrf
            <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-top:1%">

                @foreach ($status_takeaway as $item)
                    @if ($item->status_takeaway == 'aktif')
                        <button class="btn btn-light" type="submit" name="pilih_jenis_reservasi" value='TAKE AWAY'
                            class="btn btn-dark">
                            <div class="card-body" style="background-color: #63b8a7;">
                                <h5 class="card-title"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color:#264c3d">
                                    TAKE AWAY</h5>
                                <p class="card-text"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color: #264c3d;margin-top:10%">
                                    Take Away dapat dilakukan dihari yang
                                    sama, dengan anttrian terpisah</p>
                            </div>
                        </button>
                    @else
                        <button disabled class="btn btn-light" type="submit" name="pilih_jenis_reservasi"
                            value='TAKE AWAY' class="btn btn-dark">
                            <div class="card-body" style="background-color: #63b8a7;">
                                <h5 class="card-title"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color:#264c3d">
                                    TAKE AWAY</h5>
                                <p class="card-text"
                                    style="display: flex; align-items:center; text-align:center; justify-content:center; color: #264c3d;margin-top:10%">
                                    Take Away dapat dilakukan dihari yang
                                    sama, dengan anttrian terpisah</p>
                            </div>
                        </button>
                    @endif
                @endforeach

            </div>
        </form>

        {{-- <button style="width: 50%; margin: 5%" type="button" class="btn btn-dark"
            onclick="location.href='{{ url('reservasi-input-nama') }}'">Lanjut</button> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
