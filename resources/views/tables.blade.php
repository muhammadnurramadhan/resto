@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Daftar pelanggan / customer</h6>
                            <button class="btn btn-info btn-sm" type="button" onclick="location.href='{{ url('pelanggan-add') }}'">Add Customer</button>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="text-align: center">Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jenis reservasi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Waktu kedatangan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah orang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah dp</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($members as $item)
                                            @if ($item->role == '3')
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> --}}
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                                <p class="text-xs text-secondary mb-0">{{ $item->email }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td style="text-align: center">
                                                        <p class="text-xs font-weight-bold mb-0" style="text-align: center">
                                                            {{ $item->email }}</p>
                                                    </td>

                                                    <td class="align-middle text-center text-sm" style="text-align: center">
                                                        @if ($item->pilih_jenis_reservasi != null)
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $item->pilih_jenis_reservasi }}</span>
                                                        @else
                                                            <span class="text-secondary text-xs font-weight-bold">-</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle text-center" style="text-align: center">
                                                        @if ($item->waktu_kedatangan != null)
                                                            <span
                                                                class="text-secondary text-xs font-weight-bold">{{ $item->waktu_kedatangan }}
                                                                &nbsp; wib</span>
                                                        @else
                                                            <span class="text-secondary text-xs font-weight-bold">-</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-middle text-center" style="text-align: center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $item->jumlah_kedatangan }}
                                                            &nbsp; orang</span>
                                                    </td>

                                                    <td class="align-middle text-center" style="text-align: center">
                                                        <span class="text-secondary text-xs font-weight-bold">Rp. &nbsp;
                                                            {{ $item->jumlah_dp }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('pelanggan.edit', $item->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <form action="{{ route('pelanggan.destroy', $item->id) }}"
                                                            method="post" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm""
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @else
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- daftar waiters --}}
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Daftar waiters</h6>
                            <button class="btn btn-info btn-sm" type="button" onclick="location.href='{{ url('pelanggan-add') }}'">Add Waiters</button>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="text-align: center">Status waiters</th>
                                            
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($members as $item)
                                            @if ($item->role == '2')
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> --}}
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                                <p class="text-xs text-secondary mb-0">{{ $item->email }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td style="text-align: center">
                                                        <p class="text-xs font-weight-bold mb-0" style="text-align: center">
                                                            {{ $item->status_aktif }}</p>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="{{ route('pelanggan.edit', $item->id) }}"
                                                            class="btn btn-primary btn-sm">Edit</a>
                                                        <form action="{{ route('pelanggan.destroy', $item->id) }}"
                                                            method="post" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm""
                                                                type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @else
                                            @endif
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
