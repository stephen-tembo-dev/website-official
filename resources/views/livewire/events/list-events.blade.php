<div>
    <div class="container">
        <div class="mt" style="position: relative;">
            <div
                style="width: 100%; height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/banner-zuct-2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius: 8px;">
                <h5 class="center white-text"
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    Events</h5>
            </div>
        </div>

        <h5 class="grey-text lighten-3 mt heading"><b>Latest</b></h5>

        <div class="row">
            @if ($event)
                @php
                    $imagePath = asset('storage/uploads/' . $event->image_path);
                    $date = \Carbon\Carbon::create($event->date);
                    $day = $date->format('d');
                    $month = $date->format('M');
                    $title = strlen($event->title) < 55 ? $event->title : str()->limit($event->title, 55);
                    $venue = strlen($event->venue) < 35 ? $event->venue : str()->limit($event->venue, 35);
                @endphp

                <div class="col s12 l4">
                    <div @can('editor') class="edit-box" @endcan>
                        <div class="event-card">
                            <a href="{{ route('events.show', $event) }}" class="event-card__link">
                                <div class="event-card__image-box">
                                    <img class="event-card__image" src="{{ $imagePath }}">
                                </div>
                                <div class="event-card__content">
                                    <div class="event-card__date">
                                        <p class="event-card__day">{{ $day }}</p>
                                        <p class="event-card__month">{{ $month }}</p>
                                        {{-- <p class="event-card__year">2024</p> --}}
                                    </div>
                                    <div class="event-card__details">
                                        <p class="event-card__title">{{ $title }}
                                        </p>
                                        <div class="event-card__location">
                                            <i class="tiny material-icons">location_on</i>
                                            <span class="event-card__venue light-deca grey-text">
                                                {{ $venue }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="event-card__footer"></div> --}}
                            </a>
                        </div>

                        @can('editor')
                            <p class="right-align">
                                <a href="{{ route('events.edit', $event->id) }}" class="btn-floating btn-small orange pulse"
                                    href=""><i class="material-icons ">edit</i></a>

                                <a href="{{ route('events.create') }}" class="btn-floating btn-small orange pulse"
                                    href=""><i class="material-icons ">add</i></a>
                            </p>
                        @endcan
                    </div>
                </div>
            @else
                <div class="col s12 m6 l4 mb-sm">
                    <div @can('editor') class="edit-box" @endcan>
                        <div class="event-card">
                            <a href="#" class="event-card__link">
                                <div class="event-card__image-box">
                                    <img class="event-card__image"
                                        src="https://placehold.co/1000x200@2x.png?text=No+Image&font=roboto">
                                </div>
                                <div class="event-card__content">
                                    <div class="event-card__date">
                                        <p class="event-card__day">{{ now()->format('d') }}</p>
                                        <p class="event-card__month">{{ now()->format('M') }}</p>
                                        {{-- <p class="event-card__year">2024</p> --}}
                                    </div>
                                    <div class="event-card__details">
                                        <p class="event-card__title">Placeholder event title</p>
                                        <div class="event-card__location">
                                            <i class="tiny material-icons">location_on</i>
                                            <span class="event-card__venue light-deca grey-text">
                                                Placeholder event venue
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="event-card__footer"></div> --}}
                            </a>
                        </div>

                        @can('editor')
                            <p class="right-align">
                                <a href="{{ route('events.create') }}" class="btn-floating btn-small orange pulse"
                                    href=""><i class="material-icons ">add</i></a>
                            </p>
                        @endcan
                    </div>
                </div>
            @endif
        </div>

        <h5 class="grey-text lighten-3 mt heading"><b>Events</b></h5>

        <div id="paginated-events" class="section scrollspy">
            <div class="row wow fadeIn">
                @if (count($events) > 0)
                    @foreach ($events as $index => $event)
                        @php
                            $imagePath = asset('storage/uploads/' . $event->image_path);
                            $date = \Carbon\Carbon::create($event->date);
                            $day = $date->format('d');
                            $month = $date->format('M');
                            $title = strlen($event->title) < 55 ? $event->title : str()->limit($event->title, 55);
                            $venue = strlen($event->venue) < 35 ? $event->venue : str()->limit($event->venue, 35);
                        @endphp

                        <div class="col s12 l4">
                            <div @can('editor') class="edit-box" @endcan>
                                <div class="event-card">
                                    <a href="{{ route('events.show', $event) }}" class="event-card__link">
                                        <div class="event-card__image-box">
                                            <img class="event-card__image" src="{{ $imagePath }}">
                                        </div>
                                        <div class="event-card__content">
                                            <div class="event-card__date">
                                                <p class="event-card__day">{{ $day }}</p>
                                                <p class="event-card__month">{{ $month }}</p>
                                                {{-- <p class="event-card__year">2024</p> --}}
                                            </div>
                                            <div class="event-card__details">
                                                <p class="event-card__title">{{ $title }}
                                                </p>
                                                <div class="event-card__location">
                                                    <i class="tiny material-icons">location_on</i>
                                                    <span class="event-card__venue light-deca grey-text">
                                                        {{ $venue }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="event-card__footer"></div> --}}
                                    </a>
                                </div>

                                @can('editor')
                                    <p class="right-align">
                                        <a href="{{ route('events.edit', $event->id) }}"
                                            class="btn-floating btn-small orange pulse" href=""><i
                                                class="material-icons ">edit</i></a>
                                    </p>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

        <div class=" mb">
            {{ $events->links(data: ['scrollTo' => '#paginated-events']) }}
        </div>

    </div>

</div>
