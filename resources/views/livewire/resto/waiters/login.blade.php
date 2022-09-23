<!-- <div>
    {{-- Do your work, then step back. --}}
    intro page
</div> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waiters login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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

        <img width="45%" class="img-fluid" src="{{ asset('assets/img/resto/intro/xfoods.png') }}" class="intro" style="margin-top: 25%;">

        <div class="form-group" style="margin-top: 15%;">
            <input type="name" class="form-control" id="userid" aria-describedby="userid" placeholder="User ID">
        </div>

        <div class="form-group" style="margin-top: 5%;">
            <input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Password">
        </div>

        <button style="width: 50%; margin: 10%; background-color:#264c3d" type="button" class="btn btn-dark"  onclick="location.href='<?php echo url('waiters-menu') ?>'">LOGIN</button>   
        <!-- <button style="width: 50%; margin: 10%; background-color:#264c3d" type="button" class="btn btn-dark"  onclick="location.href='<?php echo url('') ?>'">Whatsapp</button> -->
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>