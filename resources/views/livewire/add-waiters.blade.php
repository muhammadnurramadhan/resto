<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create data antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div style="width:100%; justify-content:center; align-items:center; justify-content:center">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <div class="card" style="padding:5%">

                    <h5 class="card-title">Add Waiters</h5>

                    <form method="post" action="{{ route('waiters.store') }}">
                        @csrf
                        <div class="form-group" style="margin-top: 2%">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="userid">Userid</label>
                            <input type="text" class="form-control" id="userid" name="userid" value="" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="pilih_cabang">Pilih cabang</label>
                            <input type="text" class="form-control" id="pilih_cabang" name="pilih_cabang" value="" />
                        </div>
                        {{-- <div class="form-group" style="margin-top: 2%">
                            <label for="pilih_jenis_reservasi">Jenis reservasi</label>
                            <input type="text" class="form-control" id="pilih_jenis_reservasi" name="pilih_jenis_reservasi" value="" />
                        </div> --}}
                        <div class="input-group mb-3" style="margin-top: 3%">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status_aktif">Status Aktif
                                </label>
                            </div>
                            <select name="status_aktif" class="custom-select" id="status_aktif">
                                <option selected disabled style="font-style: italic">
                                </option>
                                <option value="aktif" style="font-style: italic">Aktif</option>
                                <option value="tidak aktif" style="font-style: italic">Tidak Aktif</option>
                            </select>
                        </div>
                        {{-- <div class="form-group" style="margin-top: 2%">
                            <label for="jumlah_kedatangan">Jumlah kedatangan</label>
                            <input type="text" class="form-control" id="jumlah_kedatangan" name="jumlah_kedatangan" value="" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="meja">Meja</label>
                            <input type="text" class="form-control" id="meja" name="meja" value="" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="pesanan">Pesanan</label>
                            <input type="text" class="form-control" id="pesanan" name="pesanan" value="" />
                        </div> --}}
                        {{-- <div class="form-group" style="margin-top: 2%">
                          
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="" />
                        </div> --}}
                        <!-- <div class="form-group" style="margin-top: 2%">
                            <label for="status_kehadiran">Status kehadiran</label>
                            <input type="text" class="form-control" name="status_kehadiran"
                                value="" />
                        </div>

                        <div class="form-group" style="margin-top: 2%">
                            <label for="antrian_sekarang">Antrian sekarang</label>
                            <input type="text" class="form-control" name="antrian_sekarang"
                                value="" />
                        </div>
                        <div class="form-group" style="margin-top: 2%">
                            <label for="jumlah_orang">Jumlah orang</label>
                            <input type="text" class="form-control" name="jumlah_orang"
                                value="" />
                        </div> -->

                        <div style="display: flex; flex-direction:row;">
                            <div style="margin-top: 2%; ">

                                <button type="submit" class="btn btn-block btn-danger">Create User</button>
                            </div>
                            <div style="margin-top: 2%; margin-left:2%">
                                <button type="button" class="btn btn-block btn-outline-primary"
                                    onclick="location.href='{{ url('customer-data') }}'">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</body>

</html>
