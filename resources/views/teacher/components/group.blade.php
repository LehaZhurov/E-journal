<div class="d-flex justify-content-center flex-column align-items-center">
    <div class="container-fluid">
        @foreach ($groups as $group)
            <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading{{ $group->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse{{ $group->id }}" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapse{{ $group->id }}">
                            {{ $group->name }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse{{ $group->id }}" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-heading{{ $group->id }}">
                        <div class="accordion-body">
                            <ul class="collection">
                                @foreach ($group->users as $user)
                                    <li class="collection-item">{{ $user->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
  </div>
</div>
