<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/feather-icons"></script>

    <title>{{ appName() }}</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            padding: 1rem;
        }
        .container {
            display: flex;
            justify-content: center;
        }
        .card{
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            width: 100%;
            height: 200px;
            position: relative;
            border-radius: 10px;
            margin-top: 4rem;
        }
        .card .card-img{

            height: 247px;
            object-fit: contain;
            object-position: right;
            margin-top: -55px;
        }
        .card-img-overlay{
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem;
            border-radius: calc(.25rem - 1px);
            color: #fff;
            max-width: 62%;
            z-index: 3;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 2rem;

        }
        .bg-primary {
            background-color: #324ede !important;
        }
        .code{
            display: inline-block;
            padding: .25em .4em;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            background-color: #f8f9fa;
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
            font-family: 'Josefin Sans', sans-serif;      }
        .card-title{
            font-size: 1.9rem;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: .75rem;

        }
        .card-text{

            margin-bottom: 1rem;
        }
        @media (max-width: 767px) {
            .card-img-overlay{
                position: relative;
                background: #324ede;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card bg-primary text-white">
        <img class="card-img" src="./images/mail-temaplet.png" alt="Card image">
        <div class="card-img-overlay">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
