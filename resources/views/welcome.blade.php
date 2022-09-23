<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @vite(['resources/css/app.css'])
    <title>E-journal</title>
</head>

<body id='body'>
    <div class="container-fluid d-flex justify-content-center align-items-center flex-column">
        <img src="{{ asset('/storage/img/logo.png') }}" alt="">
        <h1 class = 'slogan'>Современный-Молодёжный-Электронный журнал</h1>
        <a href="/login" id = "loginhref">Войти</a>
    </div>
    {{-- @vite(['resources/js/student/app.js']); --}}
</body>

</html>
