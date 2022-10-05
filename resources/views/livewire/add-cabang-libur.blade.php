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

                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Tambah waktu libur - cabang</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">

                            <form action="{{ url('cabang-add-libur') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>Jam Libur</th>
                                        <th>Tanggal Libur</th>
                                        <th>Cabang</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td><input type="time" name="addMoreInputFields[0][jam_libur]"
                                                placeholder="Enter jam libur" class="form-control" />
                                        </td>

                                        <td><input type="date" name="addMoreInputFields[0][tanggal_libur]"
                                                placeholder="Enter tanggal libur" class="form-control" />
                                        </td>

                                        <td><input type="text" name="addMoreInputFields[0][cabang]"
                                                placeholder="Enter cabang" class="form-control" />
                                        </td>

                                        <td><button type="button" name="add" id="dynamic-ar"
                                                class="btn btn-outline-primary">Tambah</button></td>
                                    </tr>
                                </table>
                                <div style="display: flex; flex-direction:row">

                                    <div style="margin-top: 2%; margin-left:2%">
                                        <button type="submit" class="btn btn-block btn-outline-primary">Simpan</button>
                                    </div>
                                    <div style="margin-top: 2%; margin-left:2%">
                                        <button type="button" class="btn btn-block btn-outline-danger"
                                            onclick="location.href='{{ url('customer-antrian') }}'">Kembali</button>
                                    </div>
                                </div>
                            </form>

                        </div>
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
    $("#dynamic-ar").click(function() {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="time" name="addMoreInputFields[' + i +
            '][jam_libur]" placeholder="Enter jam libur" class="form-control" /></td><td><input type="date" name="addMoreInputFields[' +
            i +
            '][tanggal_libur]" placeholder="Enter tanggal libur" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' +
            i +
            '][cabang]" placeholder="Enter cabang" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('tr').remove();
    });
</script>

</html>
