<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Cabang</title>
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
    <div style="display: flex; justify-content:center; align-items:center; flex-direction:column; margin-top: 5%">
        <h1 style="color: #63b8a7;font-size:3rem; margin-top: 10%">Pilih Cabang</h1>
        <h1 style="color: #264c3d;font-size:1.4rem; text-align:center">Silahkan pilih cabang yang kamu inginkan</h1>

        <form role="form text-left" method="POST" action="/cabang-session">
            @csrf
            @foreach ($cabang as $item)
                @if ($item->id % 2 == 0)
                    <div style="display: flex; justify-content:center; align-items:center; width: 100%; margin: 5%">
                        <button class="btn btn-light" type="submit" name="pilih_cabang" value='{{$item->nama}}'
                            class="btn btn-dark">
                            <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-top:10%">
                                <div class="card-body" style="background-color: #63b8a7;">
                                    <h5 class="card-title"
                                        style="display: flex; align-items:center; text-align:center; justify-content:center">
                                        {{ $item->nama }}
                                    </h5>
                                    <p class="card-text"
                                        style="display: flex; align-items:center; text-align:center; justify-content:center;margin-top:10%">
                                        {{ $item->sub_nama }}</p>
                                </div>
                            </div>
                        </button>
                    </div>
                @else
                    <div style="display: flex; justify-content:center; align-items:center; width: 100%; margin: 5%">
                        <button class="btn btn-light" type="submit" name="pilih_cabang" value='{{$item->nama}}'
                            class="btn btn-dark">
                            <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-top:10%">
                                <div class="card-body" style="background-color: #264c3d;">
                                    <h5 class="card-title"
                                        style="display: flex; align-items:center; text-align:center; justify-content:center">
                                        {{ $item->nama }}
                                    </h5>
                                    <p class="card-text"
                                        style="display: flex; align-items:center; text-align:center; justify-content:center;margin-top:10%">
                                        {{ $item->sub_nama }}</p>
                                </div>
                            </div>
                        </button>
                    </div>
                @endif
            @endforeach

            {{-- <div style="display: flex; justify-content:center; align-items:center; width: 100%; margin: 5%">
                <button class="btn btn-light" type="submit" name="pilih_cabang"
                    value='NOLDA MELAWAI'
                    class="btn btn-dark">
                    <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-top:1%">
                        <div class="card-body" style="background-color: #63b8a7;">
                            <h5 class="card-title"
                                style="display: flex; align-items:center; text-align:center; justify-content:center; color:#264c3d">
                                NOLDA MELAWAI</h5>
                            <p class="card-text"
                                style="display: flex; align-items:center; text-align:center; justify-content:center; color: #264c3d;margin-top:10%">
                                Jl. Melawai No. XXX, Blok M, Jakarta
                                Selatan</p>
                        </div>
                    </div>
                </button>
            </div>

            <div style="display: flex; justify-content:center; align-items:center; width: 100%; margin: 5%">
                <button class="btn btn-light" type="submit" name="pilih_cabang" value='NOLDA BOGOR'
                    class="btn btn-dark">
                    <div class="card text-bg-success mb-3" style="max-width: 18rem; margin-top:1%">
                        <div class="card-body" style="background-color: #264c3d;">
                            <h5 class="card-title"
                                style="display: flex; align-items:center; text-align:center; justify-content:center">
                                NOLDA BOGOR
                            </h5>
                            <p class="card-text"
                                style="display: flex; align-items:center; text-align:center; justify-content:center;margin-top:10%">
                                Taman XXX, Jl.Raya Bogor KM 15, Kota
                                Bogor, Jawa Barat</p>
                        </div>
                    </div>
                </button>
            </div> --}}
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
