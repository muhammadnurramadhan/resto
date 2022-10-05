@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Status cabang</h6>
                            <button class="btn btn-info btn-sm" type="button"
                                onclick="location.href='{{ url('cabang-add') }}'">Add cabang</button>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="text-align: center">No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama cabang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah meja</th>
                                            {{-- <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal tutup</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jam tutup</th> --}}

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status antrian reservasi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status antrian dine-in</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status anrian take-away</th>

                                            {{-- <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No antrian</th> --}}
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Actions</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($antrian as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> --}}
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->id }}</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->nama }}
                                                    </a>
                                                </td>

                                                <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->jumlah_meja }}
                                                    </a>
                                                </td>

                                                {{-- <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->tanggal_tutup }}
                                                    </a>
                                                </td>

                                                <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->jam_tutup }}
                                                    </a>
                                                </td> --}}

                                                @if ($item->status_reservasi == 'aktif')
                                                    <td class="align-middle text-center text-sm" style="text-align: center">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $item->status_reservasi }}</span>
                                                    </td>
                                                @else
                                                    <td class="align-middle text-center text-sm" style="text-align: center">
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">{{ $item->status_reservasi }}</span>
                                                    </td>
                                                @endif

                                                @if ($item->status_dinein == 'aktif')
                                                    <td class="align-middle text-center text-sm" style="text-align: center">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $item->status_dinein }}</span>
                                                    </td>
                                                @else
                                                    <td class="align-middle text-center text-sm" style="text-align: center">
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">{{ $item->status_dinein }}</span>
                                                    </td>
                                                @endif

                                                @if ($item->status_takeaway == 'aktif')
                                                    <td class="align-middle text-center text-sm" style="text-align: center">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $item->status_takeaway }}</span>
                                                    </td>
                                                @else
                                                    <td class="align-middle text-center text-sm" style="text-align: center">
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">{{ $item->status_takeaway }}</span>
                                                    </td>
                                                @endif


                                                {{-- <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->no_antrian }}
                                                    </a>
                                                </td> --}}

                                                <td class="text-center">
                                                    <a href="{{ route('cabang.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('cabang.destroy', $item->id) }}" method="post"
                                                        style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm""
                                                            type="submit">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Status libur cabang</h6>
                            <button class="btn btn-info btn-sm" type="button"
                                onclick="location.href='{{ url('cabang-waktu-libur') }}'">Add waktu libur</button>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="text-align: center">No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama cabang</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jam tutup</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal tutup</th>

                                            {{-- <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Actions</th> --}}
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($libur as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> --}}
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->id }}</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->cabang }}
                                                    </a>
                                                </td>
                                                
                                                <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->jam_libur }}
                                                    </a>
                                                </td>
                                                
                                                <td class="align-middle" style="text-align: center">
                                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        {{ $item->tanggal_libur }}
                                                    </a>
                                                </td>

                                                
                                                {{-- <td class="text-center">
                                                    <a href="{{ route('cabang.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('cabang.destroy', $item->id) }}"
                                                        method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm""
                                                            type="submit">Delete</button>
                                                    </form>
                                                </td> --}}

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection
