<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit data pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div style="width:100%; justify-content:center; align-items:center; justify-content:center">
        <div class="card">
            @if ($pelanggan->role == 3)
                <div class="card-body">
                    <div class="card" style="padding:5%">
                        <h5 class="card-title">Customer {{ $pelanggan->userid }}</h5>

                        <form method="post" action="{{ route('pelanggan.update', $pelanggan->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group" style="margin-top: 2%">

                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $pelanggan->name }}" />
                            </div>
                            <div class="form-group" style="margin-top: 2%">
                                <label for="pilih_cabang">Cabang</label>
                                <input type="text" class="form-control" name="pilih_cabang"
                                    value="{{ $pelanggan->pilih_cabang }}" />
                            </div>

                            <div class="form-group" style="margin-top: 2%">
                                <label for="pilih_jenis_reservasi">Jenis reservasi</label>
                                <input type="text" class="form-control" name="pilih_jenis_reservasi"
                                    value="{{ $pelanggan->pilih_jenis_reservasi }}" />
                            </div>
                            <div class="form-group" style="margin-top: 2%">
                                <label for="jumlah_kedatangan">Jumlah kedatangan</label>
                                <input type="text" class="form-control" name="jumlah_kedatangan"
                                    value="{{ $pelanggan->jumlah_kedatangan }}" />
                            </div>

                            <div class="form-group" style="margin-top: 2%">
                                <label for="meja">Meja</label>
                                <input type="text" class="form-control" name="meja"
                                    value="{{ $pelanggan->meja }}" />
                            </div>

                            <div class="form-group" style="margin-top: 2%">
                                <label for="jumlah_dp">Jumlah dp</label>
                                <input type="text" class="form-control" name="jumlah_dp"
                                    value="{{ $pelanggan->jumlah_dp }}" />
                            </div>

                            <div class="form-group" style="margin-top: 2%">
                                <label for="pesanan">Pesanan</label>
                                <input type="text" class="form-control" name="pesanan"
                                    value="{{ $pelanggan->pesanan }}" />
                            </div>
                            <div style="display: flex; flex-direction:row;">

                                <div style="margin-top: 2%; ">
                                    <button type="submit" class="btn btn-block btn-outline-primary">Update
                                        Pelanggan</button>
                                </div>

                                <div style="margin-top: 2%; margin-left:2%">
                                    <button type="button" class="btn btn-block btn-outline-primary"
                                        onclick="location.href='{{ url('customer-data') }}'">Kembali</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="card-body">
                    <div class="card" style="padding:5%">
                        <h5 class="card-title">Waiters {{ $pelanggan->userid }}</h5>

                        <form method="post" action="{{ route('waiters.update', $pelanggan->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group" style="margin-top: 2%">

                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $pelanggan->name }}" />
                            </div>


                            <div class="input-group mb-3" style="margin-top: 3%">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status_aktif">Status Aktif
                                    </label>
                                </div>
                                <select name="status_aktif" class="custom-select" id="status_aktif">
                                    <option selected disabled style="font-style: italic">{{ $pelanggan->status_aktif }}
                                    </option>
                                    <option value="aktif" style="font-style: italic">Aktif</option>
                                    <option value="tidak aktif" style="font-style: italic">Tidak Aktif</option>
                                </select>
                            </div>

                            <div style="display: flex; flex-direction:row;">

                                <div style="margin-top: 2%; ">
                                    <button type="submit" class="btn btn-block btn-outline-primary">Update
                                        Waiters</button>
                                </div>

                                <div style="margin-top: 2%; margin-left:2%">
                                    <button type="button" class="btn btn-block btn-outline-primary"
                                        onclick="location.href='{{ url('customer-data') }}'">Kembali</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>


    </div>
</body>

</html>
