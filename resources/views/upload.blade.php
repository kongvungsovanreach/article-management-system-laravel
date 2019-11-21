<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/uploadAction" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="thumbnail">
        <input type="submit" value="Upload Now">
    </form>
    {{-- <img src="{{url('storage/upload/fZ4bgjUjBXIDz1qVozHh5mmZwJouYA2edxFZXHno.jpeg')}}" alt=""> --}}
</body>
</html>