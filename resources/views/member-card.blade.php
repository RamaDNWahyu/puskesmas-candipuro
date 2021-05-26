<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">
    <title>Kartu Pasien</title>
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }
    </style>
</head>
<body>
<div style="position: relative; background-image: url('/media/users/card.jpg');background-size: cover; background-position: center;height:230px;width:460px;">
    <div style="position: absolute; top: 25%; left: 17%">
        <span>NO KTP/ID</span>: <span style="font-weight: 700">{{ $data->ktp }}</span>
    </div>
    <div style="position: absolute; top: 38%; left: 17%">
        <span>NO RM</span>: <span style="font-weight: 700">{{ $data->no_rm }}</span>
    </div>
    <div style="position: absolute; top: 50%; left: 17%">
        <span>Nama Pasien</span>: <span style="font-weight: 700">{{ $data->name }}</span>
    </div>
    <div style="position: absolute; top: 62%; left: 17%">
        <span>Alamat</span>: <span style="font-weight: 700">{{ $data->alamat }}</span>
    </div>


    <p style="position:absolute; top: 0%; left: 15%; font-size: 1.2rem; text-align: center; text-transform: uppercase;font-weight: 700">Puskesmas Candipuro</p>
    <p style="position:absolute; bottom: 0%; left: 23%; font-size: .7rem; text-align: left; text-transform: uppercase;font-weight: 300">Candipuro/Titiwangi, Candipuro, Kabupaten Lampung Selatan, Lampung 35356</p>
</div>
</body>
</html>
