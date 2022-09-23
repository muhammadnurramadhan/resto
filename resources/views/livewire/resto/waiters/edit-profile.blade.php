<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #63b8a7;
        }

        hr.line1 {
            border: 3px solid #3C3C3C;
            border-radius: 5px;
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

<body class="body">
    <div style="display: flex; width: 100%; flex-direction: column">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 5%; padding-right:5%">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div>
                <a class="navbar-brand" href="{{ url()->previous() }}">Back</a>
                <a class="navbar-brand" href="{{ url('waiters-login') }}">Logout</a>
            </div> --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('waiters-edit-profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('waiters-password') }}">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('waiters-login') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="display: flex; margin-top:7%; justify-content:center; align-items:center; flex-direction:column">
            <div style="display: flex; justify-content:center; align-items:center; flex-direction:row">
                <div style="width: 200px; height: 200px">
                    <i class="bi bi-person-circle" style="font-size: 170px;"></i>
                </div>
                <div style="display: flex; margin-bottom:100px">
                    <i class="bi bi-pencil-square"></i>
                </div>
            </div>

            <!-- edit nama danlainnya -->
            <div style="display: flex; margin: 10%">

                {{-- <form role="form text-left" method="POST" action="/waiters-session">
                    @csrf
                    <div class="form-group" style="margin-top: 5%;">
                        <input type="userid" class="form-control" placeholder="User id" name="userid" id="userid"
                            aria-label="Password" aria-describedby="userid-addon">
                        @error('userid')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="form-group" style="margin-top: 5%;">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                            aria-label="Password" aria-describedby="password-addon">
                        @error('password')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div style="display: flex; justify-content:center; align-items:center; margin-top: 10%">
                        <button
                            style="width: 50%; margin-top: 10%; background-color:#264c3d; display: flex; align-items: center; justify-content:center"
                            type="submit" class="btn btn-dark">Login</button>
                    </div>
                </form> --}}

                <form method="POST" action="waiters-profile-session">

                    @csrf
                    <div class="form-group" style="margin: 5%;">
                        <label for="name">Nama</label>
                        <input type="name" name="name" class="form-control" id="name" aria-describedby="name"
                            placeholder={{ $user->name }}>
                        <small id="namaHelp" class="form-text text-light">edit nama waiters</small>
                        @error('name')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group" style="margin: 5%;">
                        <label for="userid">Waiters / userid</label>
                        <input name="userid" type="userid" class="form-control" id="userid"
                            aria-describedby="userid" placeholder={{ $user->userid }}>
                        <small id="waitersHelp" class="form-text text-light">Edit waiters.</small>
                        @error('userid')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group" style="margin: 5%;">
                        <label for="exampleInputEmail1">Alamat email</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder={{ $user->email }}>
                        <small id="emailHelp" class="form-text text-light">Edit alamat email.</small>
                        @error('email')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group" style="margin: 5%;">
                        <label for="exampleInputEmail1">Ubah Password</label>
                        <input name="password" type="password" class="form-control" id="password" aria-describedby="password"
                            placeholder="Ubah password">
                        <small id="password" class="form-text text-light">Edit password.</small>
                        @error('password')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group" style="margin: 5%;">
                        <label for="phone">Nomor Hp</label>
                        <input name="phone" type="number" class="form-control" id="phone"
                            placeholder={{ $user->phone }}>
                        <small id="hpHelp" class="form-text text-light">Edit nomor handphone / whatsapp.</small>
                        @error('phone')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div style="display: flex; justify-content:center; align-items:center; margin-top: 10%">
                        <button
                            style="width: 50%; margin-top: 10%; background-color:#264c3d; display: flex; align-items: center; justify-content:center"
                            type="submit" class="btn btn-dark">Edit profile</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selamat !</h5>

                    </div>
                    <div class="modal-body">
                        Edit Profile Berhasil
                    </div>
                    <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script> -->

</html>
