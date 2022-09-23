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

                    <h5 class="card-title">Add cabang</h5>

                    <form method="post" action="cabang-store">
                        @csrf
                        <div class="form-group" style="margin-top: 2%">
                            <label for="nama">Nama cabang</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="" />
                        </div>
                        
                        <div class="form-group" style="margin-top: 2%">
                            <label for="sub_nama">Sub nama cabang</label>
                            <input type="text" class="form-control" id="sub_nama" name="sub_nama" value="" />
                        </div>

                        

                        <div class="input-group mb-3" style="margin-top: 3%">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status_reservasi">Status Antrian
                                    Reservasi</label>
                            </div>
                            <select name="status_reservasi" class="custom-select" id="status_reservasi">
                                {{-- <option selected disabled style="font-style: italic">
                                    {{ $pelanggan->status_reservasi == 'aktif' ? 'Buka' : ($pelanggan->status_reservasi == 'stop' ? 'Tutup' : 'Pause') }}
                                </option> --}}
                                <option value="aktif" style="font-style: italic">Buka</option>
                                <option value="pause" style="font-style: italic">Pause</option>
                                <option value="stop" style="font-style: italic">Tutup</option>
                            </select>
                        </div>
                        

                        <div class="input-group mb-3" style="margin-top: 3%">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status_dinein">Status Antrian
                                    Dine-in</label>
                            </div>
                            <select name="status_dinein" class="custom-select" id="status_dinein">
                                {{-- <option selected disabled style="font-style: italic">
                                    {{ $pelanggan->status_dinein == 'aktif' ? 'Buka' : ($pelanggan->status_dinein == 'stop' ? 'Tutup' : 'Pause') }}
                                </option> --}}
                                <option value="aktif" style="font-style: italic">Buka</option>
                                <option value="pause" style="font-style: italic">Pause</option>
                                <option value="stop" style="font-style: italic">Tutup</option>
                            </select>
                        </div>
                        

                        <div class="input-group mb-3" style="margin-top: 3%">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status_takeaway">Status Antrian
                                    Take-away</label>
                            </div>
                            <select name="status_takeaway" class="custom-select" id="status_takeaway">
                                {{-- <option selected disabled style="font-style: italic">
                                    {{ $pelanggan->status_takeaway == 'aktif' ? 'Buka' : ($pelanggan->status_takeaway == 'stop' ? 'Tutup' : 'Pause') }}
                                </option> --}}
                                <option value="aktif" style="font-style: italic">Buka</option>
                                <option value="pause" style="font-style: italic">Pause</option>
                                <option value="stop" style="font-style: italic">Tutup</option>
                            </select>
                        </div>
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

                                <button type="submit" class="btn btn-block btn-danger">Create cabang</button>
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
