<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waiters Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #63b8a7;
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
    <div style="display: flex; justify-content:center; align-items:center; flex-direction:column">

        <img width="45%" class="img-fluid" src="{{ asset('assets/img/resto/intro/xfoods.png') }}" class="intro"
            style="margin-top: 25%;">
        <form role="form text-left" method="POST" action="waiters-register-session">
            @csrf
            <div class="form-group" style="margin-top: 15%;"><input type="text" class="form-control"
                    placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 5%;">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email"
                    aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

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

            <div style="display: flex; justify-content:center; align-items:center">
                <button
                    style="width: 50%; margin-top: 10%; background-color:#264c3d; display: flex; align-items: center; justify-content:center"
                    type="submit" class="btn btn-dark">Daftar</button>
            </div>

            <p class="text-sm mt-3 mb-0">Sudah punya akun? <a href="waiters-login"
                    class="text-dark font-weight-bolder">Sign in</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
