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
                <div class="card" style="padding:5%">

                    <h5 class="card-title">Tambah cabang</h5>

                    <form method="post" action="cabang-store">
                        @csrf
                        {{-- @method('PATCH') --}}

                        {{-- nama cabang --}}
                        <div class="form-group" style="margin-top: 2%">
                            <label for="nama">Nama cabang</label>
                            <input type="text" class="form-control" id="nama" name="nama" />
                        </div>
                        
                        <div class="form-group" style="margin-top: 2%">
                            <label for="sub_nama">Nama sub cabang</label>
                            <input type="text" class="form-control" id="sub_nama" name="sub_nama" />
                        </div>

                        {{-- nama cabang --}}
                        <div class="form-group" style="margin-top: 2%">
                            <label for="meja">Jumlah meja</label>
                            <input type="number" class="form-control" id="jumlah_meja" name="jumlah_meja" />
                        </div>

                        {{-- nama cabang --}}
                        <div class="form-group" style="margin-top: 2%">
                            <label for="fee">Fee</label>
                            <input type="number" class="form-control" id="fee" name="fee" />
                        </div>

                        

                        {{-- tanggal tutup --}}
                        {{-- <div class="form-group" style="margin-top: 2%"> --}}
                            {{-- <label for="date">Tanggal tutup</label>
                            <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup" /> --}}

                            {{-- <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Tanggal tutup</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td><input type="date" name="addMoreInputFields[0][subject]" placeholder="Enter subject" class="form-control" />
                                    </td>
                                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add tanggal</button></td>
                                </tr>
                            </table> --}}
                        {{-- </div> --}}

                        {{-- jam tutup --}}
                        {{-- <div class="form-group" style="margin-top: 2%">
                            <label for="jam_tutup">Jam tutup</label>
                            <input type="time" class="form-control" id="jam_tutup" name="jam_tutup" />
                        </div> --}}

                        {{-- status reservasi --}}
                        <div class="input-group mb-3" style="margin-top: 3%">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status_reservasi">Status Antrian
                                    Reservasi</label>
                            </div>
                            <select name="status_reservasi" class="custom-select" id="status_reservasi">
                                {{-- <option selected disabled style="font-style: italic">
                                    {{ $pelanggan->status_reservasi == 'aktif' ? 'Buka' : ($pelanggan->status_reservasi == 'stop' ? 'Tutup' : 'Pause') }} --}}
                                </option>
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
                                    {{ $pelanggan->status_dinein == 'aktif' ? 'Buka' : ($pelanggan->status_dinein == 'stop' ? 'Tutup' : 'Pause') }} --}}
                                </option>
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

                        <div style="display: flex; flex-direction:row;">
                            <div style="margin-top: 2%; ">
                                <button type="submit" class="btn btn-block btn-outline-info">Create </button>
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
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="date" name="addMoreInputFields[' + i +
            '][subject]" placeholder="Enter tanggal" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

</html>
