<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit data antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div style="width:100%; justify-content:center; align-items:center; justify-content:center">
        <div class="card">
            <div class="card-body">
                <div class="card" style="padding:5%">

                    <h5 class="card-title">Customer {{ $pelanggan->userid }}</h5>
                    
                    <form method="post" action="{{ route('antrian-dinein.update', $pelanggan->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group" style="margin-top: 2%">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $pelanggan->nama }}" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="status_kehadiran">Status kehadiran</label>
                            <input type="text" class="form-control" name="status_kehadiran"
                                value="{{ $pelanggan->status_kehadiran }}" />
                        </div>

                        <div class="form-group" style="margin-top: 2%">
                            <label for="antrian_sekarang">Antrian sekarang</label>
                            <input type="text" class="form-control" name="antrian_sekarang"
                                value="{{ $pelanggan->antrian_sekarang }}" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="jumlah_orang">Jumlah orang</label>
                            <input type="text" class="form-control" name="jumlah_orang"
                                value="{{ $pelanggan->jumlah_orang }}" />
                        </div>

                        <div style="display: flex; flex-direction:row;">
                            <div style="margin-top: 2%; ">
                                <button type="submit" class="btn btn-block btn-outline-primary">Update Pelanggan</button>
                            </div>
                            <div style="margin-top: 2%; margin-left:2%">
                                <button type="button" class="btn btn-block btn-outline-primary"
                                    onclick="location.href='{{ url('customer-antrian') }}'">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</body>

</html>
