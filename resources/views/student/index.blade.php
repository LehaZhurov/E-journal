<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @vite(['resources/css/app.css']
    )
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>E-journal</title>
</head>

<body id='body'>
    <div id="work_obl" class='conatiner-fluid'>
        <nav class="navbar navbar-expand-lg nav-pills nav-fill-green bg-green">
            <div class="container-fluid mg-5">
                <a class="navbar-brand text-light" href="#" id = "logo">E-journal 
                    <span>
                        made leha <i class='bx bxs-cat' ></i>
                    </span></a>
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
                </div>
            </div>
        </nav>
        <div class="d-flex justify-content-end flex-column" id='journal_page'>
            <div class="nav flex-row nav-pills me-12 mr-auto tabmenu" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <button class="nav-link active btn-outline-info tabbtn" id="v-pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                    aria-selected="true">
                    <span>Главная</span>
                    <i class='bx bxs-user-rectangle' ></i>
                </button>
                <button class="nav-link btn-outline-info tabbtn" id="v-pills-ratings-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-ratings" type="button" role="tab" aria-controls="v-pills-ratings"
                    aria-selected="true">
                    <span>Оценки</span>
                    <i class='bx bx-line-chart'></i>
                </button>
                <button class="nav-link tabbtn" id="v-pills-hours-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-hours" type="button" role="tab" aria-controls="v-pills-hours"
                    aria-selected="false">
                    <span>Часы</span>
                    <i class='bx bx-hourglass' ></i>
                </button>
                <button class="nav-link tabbtn" id="v-pills-records-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-records" type="button" role="tab" aria-controls="v-pills-records"
                    aria-selected="false">
                    <span>Зачетка</span>
                    <i class='bx bx-check-square' ></i>
                </button>
            </div>
            <div class="tab-content container-fluid" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab" tabindex="0">
                    @include('student.components.stat')
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-hours" role="tabpanel" aria-labelledby="v-pills-hours-tab"
                tabindex="0" style='width:100%'>
                @include('student.components.hours')
            </div>
            <div class="tab-content container-fluid" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-records" role="tabpanel" aria-labelledby="v-pills-records-tab"
                    tabindex="0" style = 'width:100%'>
                    @include('student.components.recordbook')
                </div>
            </div>
            <div class="tab-content container-fluid" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-ratings" role="tabpanel" aria-labelledby="v-pills-ratings-tab"
                    tabindex="0" style = 'width:100%'>
                    @include('student.components.historyrating')
                </div>
            </div>
            {{--
                <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
                    tabindex="0">...</div>
            </div> --}}
        </div>
    </div>
    </div>
    </div>
    <div id="alertblock">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    @vite(['resources/js/student/app.js']);
</body>

</html>
