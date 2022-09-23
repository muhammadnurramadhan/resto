<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Antrian Take away</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div>
                <a class="navbar-brand" href="{{ url()->previous() }}">Back</a>
                <a class="navbar-brand" href="{{ url('waiters-login') }}">Logout</a>
            </div> --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('waiters-menu-profile') }}">Profile</a>
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
                <form>
                    <div class="form-group" style="margin: 5%;">
                        <label for="exampleInputNama">Nama</label>
                        <input type="nama" class="form-control" id="exampleInputNama" aria-describedby="namaHelp" placeholder="Ubah nama">
                        <small id="namaHelp" class="form-text text-light">edit nama waiters</small>
                    </div>
                    <div class="form-group" style="margin: 5%;">
                        <label for="exampleInputWaiters">Waiters</label>
                        <input type="name" class="form-control" id="exampleInputWaiters" aria-describedby="waitersHelp" placeholder="Ubah waiters">
                        <small id="waitersHelp" class="form-text text-light">Edit waiters.</small>
                    </div>

                    <div class="form-group" style="margin: 5%;">
                        <label for="exampleInputEmail1">Alamat email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ubah email">
                        <small id="emailHelp" class="form-text text-light">Edit alamat email.</small>
                    </div>
                    <div class="form-group" style="margin: 5%;">
                        <label for="exampleInputHp">Nomor Hp</label>
                        <input type="number" class="form-control" id="exampleInputHp" placeholder="Ubah nomor Hp">
                        <small id="hpHelp" class="form-text text-light">Edit nomor handphone / whatsapp.</small>

                    </div>
                    <!-- <div class="form-check" style="margin: 5%">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" style="color: #f1f1f1;" for="exampleCheck1">Ceklist untuk edit</label>
                    </div> -->

                    <button style="margin-top:10%; display: flex; align-items:center; justify-content:center" type="submit" class="btn btn-dark">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> -->

</html>