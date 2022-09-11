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
    <div id="alertblock">

    </div>
    <div id="work_obl" class='conatiner-fluid'>
        <nav class="navbar navbar-expand-lg nav-pills nav-fill-green bg-green">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">E-journal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="" href="/logout"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">Выйти</a>
                        </form>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="d-flex justify-content-end flex-column" id='journal_page'>
            <div class="nav flex-row nav-pills me-12 mr-auto" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <button class="nav-link active btn-outline-info" id="v-pills-table-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-table" type="button" role="tab" aria-controls="v-pills-table"
                    aria-selected="true">
                    Журнал</button>
                <button class="nav-link" id="v-pills-groups-tab" data-bs-toggle="pill" data-bs-target="#v-pills-groups"
                    type="button" role="tab" aria-controls="v-pills-groups" aria-selected="false">
                    Группы</button>
                <button class="nav-link" id="v-pills-hours-tab" data-bs-toggle="pill" data-bs-target="#v-pills-hours"
                    type="button" role="tab" aria-controls="v-pills-hours" aria-selected="false">
                    Часы</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                    aria-selected="false">
                    Рассылка</button>
            </div>
            <div class="tab-content container-fluid" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-table" role="tabpanel"
                    aria-labelledby="v-pills-table-tab" tabindex="0">
                    @include('teacher.components.table')
                </div>
                <div class="tab-pane fade" id="v-pills-groups" role="tabpanel" aria-labelledby="v-pills-groups-tab"
                    tabindex="0" style='width:100%'>
                    @include('teacher.components.group')
                </div>
                <div class="tab-pane fade" id="v-pills-hours" role="tabpanel" aria-labelledby="v-pills-hours-tab"
                    tabindex="0" style='width:100%'>
                    @include('teacher.components.hours')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    @vite(['resources/js/teacher/app.js']);
</body>

</html>
