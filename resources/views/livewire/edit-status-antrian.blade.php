<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit status antrian</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
    <div style="width:100%; justify-content:center; align-items:center; justify-content:center">
        <div class="card">
            <div class="card-body">
                <div class="card" style="padding:5%">

                    <h5 class="card-title">Status cabang</h5>

                    <form method="post" action="{{ route('cabang.update', $pelanggan->id) }}">
                        @csrf
                        @method('PATCH')

                        {{-- nama cabang --}}
                        <div class="form-group" style="margin-top: 2%">
                            <label for="nama">Nama cabang</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $pelanggan->nama }}" />
                        </div>
                        {{-- nama cabang --}}
                        <div class="form-group" style="margin-top: 2%">
                            <label for="sub_nama">Sub nama cabang</label>
                            <input type="text" class="form-control" id="sub_nama" name="sub_nama"
                                value="{{ $pelanggan->nama }}" />
                        </div>

                        {{-- nama cabang --}}
                        <div class="form-group" style="margin-top: 2%">
                            <label for="meja">Jumlah meja</label>
                            <input type="number" class="form-control" id="jumlah_meja" name="jumlah_meja"
                                value="{{ $pelanggan->jumlah_meja }}" />
                        </div>

                        {{-- nama cabang --}}
                        <div class="form-group" style="margin-top: 2%">
                            <label for="fee">Fee</label>
                            <input type="number" class="form-control" id="fee" name="fee"
                                value="{{ $pelanggan->fee }}" />
                        </div>



                        {{-- tanggal tutup --}}
                        {{-- <div class="form-group" style="margin-top: 2%">
                            <label for="tanggal_tutup">Tanggal tutup</label>
                            <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup"
                                value="{{ $pelanggan->tanggal_tutup }}" />
                        </div> --}}
                        

                        {{-- jam tutup --}}
                        {{-- <div class="form-group" style="margin-top: 2%">
                            <label for="jam_tutup">Jam tutup</label>
                            <input type="time" class="form-control" id="jam_tutup" name="jam_tutup"
                                value="{{ $pelanggan->jam_tutup }}" />
                        </div> --}}

                        {{-- status reservasi --}}
                        <div class="input-group mb-3" style="margin-top: 3%">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="status_reservasi">Status Antrian
                                    Reservasi</label>
                            </div>
                            <select name="status_reservasi" class="custom-select" id="status_reservasi">
                                <option selected disabled style="font-style: italic">
                                    {{ $pelanggan->status_reservasi == 'aktif' ? 'Buka' : ($pelanggan->status_reservasi == 'stop' ? 'Tutup' : 'Pause') }}
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
                                <option selected disabled style="font-style: italic">
                                    {{ $pelanggan->status_dinein == 'aktif' ? 'Buka' : ($pelanggan->status_dinein == 'stop' ? 'Tutup' : 'Pause') }}
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
                                <option selected disabled style="font-style: italic">
                                    {{ $pelanggan->status_takeaway == 'aktif' ? 'Buka' : ($pelanggan->status_takeaway == 'stop' ? 'Tutup' : 'Pause') }}
                                </option>
                                <option value="aktif" style="font-style: italic">Buka</option>
                                <option value="pause" style="font-style: italic">Pause</option>
                                <option value="stop" style="font-style: italic">Tutup</option>
                            </select>
                        </div>

                        <div style="display: flex; flex-direction:row;">
                            <div style="margin-top: 2%; ">
                                <button type="submit" class="btn btn-block btn-outline-info">Update status
                                    antrian</button>
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

    {{-- date range script --}}
    {{-- <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
            $('.calbtn').on('click', function() {
                $('input[name="daterange"]').trigger('click');
            });
        });

        function calendar() {
            $('input[name="daterange"]').focus();
        }
    </script> --}}

    
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="time" name="addMoreInputFields[' + i +
            '][jam_libur]" placeholder="Enter jam libur" class="form-control" /></td><td><input type="date" name="addMoreInputFields[' + i +
            '][tanggal_libur]" placeholder="Enter tanggal libur" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][cabang]" placeholder="Enter cabang" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>

</html>
