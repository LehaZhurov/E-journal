<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>E-journal</title>
  </head>

<body>
    <div id="work_obl" class = 'conatiner_fluid'>
        <nav class="navbar navbar-expand-lg nav-pills nav-fill-green bg-green">
            <div class="container-fluid">
              <a class="navbar-brand text-light" href="#">E-journal</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                  <button class="btn btn-outline-info" type="submit">Поиск</button>
                </form>
              </div>
            </div>
          </nav>
          <div class="d-flex align-items-start ">
            <div class="nav flex-column nav-pills me-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <button class="nav-link active btn-outline-info" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                Журнал</button>
              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                Группы</button>
              <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                Предметы</button>
              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                Настройки</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                @include('teacher.components.table')
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                @include('teacher.components.group')
              </div>
              <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">...</div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
            </div>
          </div>
    </div>


    {{-- {{-- <nav class="nav-extended  green darken-1">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">E-journal</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i
                    class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#"> {{ Auth::user()->name }}</a></li>
                <li><a href="collapsible.html">Настройки</a></li>
                <li><a href="/logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-dropdown-link>
                        </form>
                    </a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">JavaScript</a></li>
            </ul>
        </div>
        {{-- <div class="nav-content">
            <ul class="tabs tabs-transparent">
                {{-- <li class="tab"><a class="active" href="#test1">Журнал</a></li> 
                <li class="tab"><a href="#test2">Группы</a></li>
                <li class="tab"><a href="#test3">Предметы</a></li>
            </ul>
        </div>
    </nav> --}} 
    {{-- <div id="test1" class="col s12">
        @include('teacher.components.table')
    </div>
    <div id="test2" class="col s12">
        @include('teacher.components.group')
    </div>
    <div id="test3" class="col s12"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    @vite(['resources/js/journalform/appenddayinform.js']),
    @vite(['resources/js/SendRequest.js']),
    @vite(['resources/js/journalform/getrating.js']),

</body>

</html>
