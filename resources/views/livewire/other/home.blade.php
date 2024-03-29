<div>
    <div>

        <div wire:ignore class="slider fullscreen z-depth-0">
            <ul class="slides">

                @if (count($pageSliderInfo) > 0)

                    @foreach ($pageSliderInfo as $slider)
                        <li>
                            <img class="responsive-img" src="{{ asset('/storage/uploads/' . $slider->image_path) }}">
                            <div class="caption left-align">
                                <h3>{{ $slider->title }}</h3>
                                <h5 class="light grey-text text-lighten-3 light-deca">
                                    {{ \Illuminate\Support\Str::limit($slider->text, 150, '...') }}</h5>
                                <br>
                                @if ($slider->button_name)
                                    <a href="{{ $slider->button_url }}"
                                        class="btn  orange darken-3 apply-button">{{ $slider->button_name }}</a>
                                @endif

                                @can('editor')
                                    <p class="right-align edit-pencil">
                                        <a class="btn-floating btn-small orange pulse"
                                            href="/edit-slider-info/{{ $slider->id }}"><i
                                                class="material-icons ">edit</i></a>
                                        <a class="btn-floating btn-small orange pulse" href="/create-slider-info"><i
                                                class="material-icons ">add</i></a>
                                    </p>
                                @endcan

                            </div>
                        </li>
                    @endforeach
                @else
                    <li>
                        <img class="responsive-img" src="{{ asset('images/placeholder.webp') }}">
                        <div class="caption left-align">
                            <h3>No title available</h3>
                            <h5 class="light grey-text text-lighten-3">No text available</h5>
                            <br>

                            @can('editor')
                                <p class="right-align edit-pencil">
                                    <a class="btn-floating btn-small orange pulse" href="/create-slider-info"><i
                                            class="material-icons ">add</i></a>
                                </p>
                            @endcan

                        </div>
                    </li>

                @endif
            </ul>

        </div>
    </div>

    <div id="segment">

        <div class="container">

            <!-- Announcements -->

            <div class="row mt-sm">
                <div class="col s12 m12 wow fadeInUp">
                    @if (count($announcements) > 0)
                        <div @can('editor') class="edit-box" @endcan id="paginated-announcements">
                            @foreach ($announcements as $announcement)
                                <div class="card-panel grey lighten-5 z-depth-4">
                                    <div class="row valign-wrapper">
                                        <div class="col m2 hide-on-small-only">
                                            <i class="material-icons medium red-text">campaign</i>
                                        </div>
                                        <div class="col m10">
                                            <div class="black-text light-deca flow-text">{{ $announcement->title }}
                                            </div>
                                            <span class="light-deca">{{ $announcement->text }}</span>
                                        </div>
                                    </div>
                                </div>

                                @can('editor')
                                    <p class="right-align edit-pencil">
                                        <a class="btn-floating btn-small orange pulse"
                                            href="{{ route('home.edit.announcement', $announcement->id) }}"><i
                                                class="material-icons ">edit</i></a>
                                    </p>
                                @endcan

                                <div class="center mt mb">
                                    @if (count($announcements) > 0)
                                        {{ $announcements->links(data: ['scrollTo' => '#paginated-announcements']) }}
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div @can('editor') class="edit-box" @endcan>
                            <div class="card-panel grey lighten-5 z-depth-4">
                                <div class="row valign-wrapper">
                                    <div class="col m2 hide-on-small-only">
                                        <i class="material-icons medium red-text">campaign</i>
                                    </div>
                                    <div class="col m10">
                                        <div class="black-text light-deca flow-text">Your Future
                                            Awaits</div>
                                        <span class="light-deca">The university is currently enrolling for the
                                            {{ now()->format('Y') }} intake</span>
                                    </div>
                                </div>
                            </div>

                            @can('editor')
                                <p class="right-align edit-pencil">
                                    <a class="btn-floating btn-small orange pulse"
                                        href="{{ route('home.create.announcement') }}"><i
                                            class="material-icons ">add</i></a>
                                </p>
                            @endcan
                        </div>
                    @endif

                </div>
            </div>

        </div>

        <div class="container">

            <h5 class="grey-text lighten-3 mt heading"><b>Programs</b></h5>

            <div class="row wow fadeInUp">
                @if (count($qualifications) > 0)
                    @foreach ($qualifications as $q)
                        <div class="col s12 m4">
                            <div class="card transparent z-depth-0">
                                <div class="card-image">
                                    <img src="{{ asset('images/blue.jpg') }}">
                                    <span class="card-title">{{ $q['name'] }}</span>
                                </div>
                                <div class="card-action">
                                    <a href="/programs/{{ $q['id'] }}/{{ $q['name'] }}"
                                        class="btn btn-small black-text white apply-button">view</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col s12 m4">
                        <div class="card transparent z-depth-0">
                            <div class="card-image">
                                <img src="{{ asset('images/placeholder.webp') }}">
                                <span class="card-title black-text">Placeholder tite</span>
                            </div>
                            <div class="card-action">
                                <a href="#" class="btn btn-small black-text white apply-button">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card transparent z-depth-0">
                            <div class="card-image">
                                <img src="{{ asset('images/placeholder.webp') }}">
                                <span class="card-title black-text">Placeholder tite</span>
                            </div>
                            <div class="card-action">
                                <a href="#" class="btn btn-small black-text white apply-button">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="card transparent z-depth-0">
                            <div class="card-image">
                                <img src="{{ asset('images/placeholder.webp') }}">
                                <span class="card-title black-text">Placeholder tite</span>
                            </div>
                            <div class="card-action">
                                <a href="#" class="btn btn-small black-text white apply-button">view</a>
                            </div>
                        </div>
                    </div>

                @endif

            </div>

        </div>

        <div class="container">
            <div class="row mt mb">
                <div class="col s12 m6 l5">
                    <h5 class="mb-sm">Study at ZUT</h5>
                    <p class="light-deca">Embark on a transformative educational journey at Zambia University College of
                        Technology. Our commitment to excellence in technology and business education sets us apart.
                        Explore our in-demand programs and join us at the forefront of innovation, where knowledge meets
                        real-world impact. Your future as an innovator begins here.</p>
                    <div class="row mt-sm">
                        <div class="col s12 m6">
                            <ul class="light-deca">
                                <li style="margin-bottom: 8px"><a href="https://www.zictcollege.ac.zm/register">Apply
                                        online</a></li>
                                <li style="margin-bottom: 8px"><a href="{{ route('campus-life') }}">Campus life</a>
                                </li>
                                <li style="margin-bottom: 8px"><a href="{{ route('campus-life') }}#tab2">Student
                                        housing</a></li>
                                <li style="margin-bottom: 8px"><a href="#">Support services</a></li>
                                <li style="margin-bottom: 8px"><a href="#">Student FAQs</a></li>
                            </ul>
                        </div>
                        <div class="col s12 m6">
                            <ul class="light-deca">
                                <li style="margin-bottom: 8px"><a href="#">Key dates</a></li>
                                <li style="margin-bottom: 8px"><a href="{{ route('campus-life') }}">Faculties</a>
                                </li>
                                <li style="margin-bottom: 8px"><a href="#">Scholarships</a></li>
                                <li style="margin-bottom: 8px"><a href="{{route('general-requirements') }}">Admission requirements</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col m6 offset-l1 center"><img src="{{ asset('images/study-at-zut.jpg') }}"
                        class="responsive-img">
                </div>

            </div>
        </div>

        <div wire:ignore @can('editor') class="edit-box" @endcan>

            <div class="parallax-container mt">
                <div class="parallax">
                    @if ($pageInfo)
                        <img src="{{ asset('/storage/uploads/' . $pageInfo->image_path) }}">
                    @else
                        <img class="responsive-img" src="{{ asset('images/placeholder.webp') }}">
                    @endif
                </div>
            </div>

            <div class="container">
                <div class="row mt">
                    <div class="col m6 s12 wow slideInLeft">
                        <h3>
                            <b>{{ $pageInfo ? $pageInfo->title : 'No title available' }}</b>
                        </h3>
                        <p class="newsbody light-deca">
                            {{ $pageInfo ? $pageInfo->text : 'No text available' }}
                            <!--div class="row">
                            <div class="col m6 s12">
                                    <button class="btn btn-small white-text indigo darken-4 apply-buttonn" href="">get started </button>
                                </div>
                                <div class="col m6 s12">
                                    <div class="counter" id="counter">0</div>
                                </div>
                            </div-->
                    </div>
                    <div class="col m6 s12 wow slideInRight">

                        <div class="video-container">
                            <iframe width="853" height="480"
                                src="{{ $pageInfo ? $pageInfo->video_url : 'https://www.youtube.com/embed/ByewYPctDf0?si=PGfQizDTX0NiiM_N' }}"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            @can('editor')
                @if ($pageInfo)
                    <p class="right-align">
                        <a href="edit-marketing-info" class="btn-floating btn-small orange pulse" href=""><i
                                class="material-icons ">edit</i></a>
                    </p>
                @else
                    <p class="right-align edit-pencil">
                        <a class="btn-floating btn-small orange pulse" href="/create-marketing-info"><i
                                class="material-icons ">add</i></a>
                    </p>
                @endif
            @endcan

        </div>

        <div class="container">

            <!--- news -->

            <h5 class="grey-text lighten-3 mt heading"><b>News</b></h5>
            <div id="news" class="section scrollspy wow fadeInUp">
                <div class="row wow fadeInUp">
                    @if (count($news) > 0)
                        @foreach ($news as $story)
                            <div class="col s12 m6 l4">
                                <div class="card ">
                                    <div class="card-image">
                                        <img src="{{ asset('/storage/uploads/' . $story->image_path) }}"
                                            alt="Image">
                                        <span class="card-title"></span>
                                    </div>
                                    <div class="card-content">
                                        <p>
                                            <b class="truncate">{{ $story->title }}</b><br>
                                        <div class="light-deca newsbody">
                                            <small
                                                class="grey-text">{{ $story->created_at->format('j M, Y') }}</small>
                                            <br><br>
                                            {{ \Illuminate\Support\Str::limit($story->text, 180, '...') }}
                                        </div>
                                        </p>
                                    </div>
                                    <div class="card-action">
                                        <a href="news-story/{{ $story->id }}"
                                            class="btn btn-small black-text white apply-button" href="#">read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col s12 m6 l4">
                            <div @can('editor') class="edit-box" @endcan>
                                <div class="card">
                                    <div class="card-image">
                                        <img src="{{ asset('images/placeholder.webp') }}" alt="Image">
                                        <span class="card-title"></span>
                                    </div>
                                    <div class="card-content">
                                        <p>
                                            <b class="truncate">No title available</b><br>
                                        <div class="light-deca">
                                            <small class="grey-text">
                                                {{ now()->format('j M, Y') }}
                                            </small>
                                            <br><br>
                                            {{ \Illuminate\Support\Str::limit('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem officia hic recusandae quis sequi blanditiis, fugit aliquid beatae architecto! Recusandae, asperiores. Eum deleniti dicta voluptas eveniet itaque maiores modi dolor.', 200, '...') }}
                                        </div>
                                        </p>
                                    </div>
                                    <div class="card-action">
                                        <a disabled href="" class="btn btn-small black-text white apply-button"
                                            href="#">read
                                            more</a>
                                    </div>
                                </div>

                                @can('editor')
                                    <p class="left-align">
                                        <a href="{{ route('news.create') }}"
                                            class="btn-floating btn-small orange pulse"><i
                                                class="material-icons ">add</i></a>
                                    </p>

                                </div>
                            </div>
                        @endcan
                    @endif

                    <div class="col s12 mt-sm center-align">
                        <a href="{{ route('news.index') }}"
                            class="waves-effect waves-light btn btn-small apply-button white black-text"><i
                                class="material-icons black-text right">arrow_forward</i>All news stories</a>
                    </div>

                </div>
            </div>

        </div>

        <div class="container">

            <!--- Events -->

            <h5 class="grey-text lighten-3 mt heading"><b>Events</b></h5>

            <div id="events" class="section scrollspy">
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

                            <div class="col s12 m6 l4 mb-sm">
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

                                            @if ($index === 0)
                                                <a href="{{ route('events.create') }}"
                                                    class="btn-floating btn-small orange pulse" href=""><i
                                                        class="material-icons ">add</i></a>
                                            @endif
                                        </p>
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col s12 m6 l4 mb-sm">
                            <div @can('editor') class="edit-box" @endcan>
                                <div class="event-card">
                                    <a href="#" class="event-card__link">
                                        <div class="event-card__image-box">
                                            <img class="event-card__image"
                                                src="{{ asset('images/placeholder.webp') }}">
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
                                        <a href="{{ route('events.create') }}"
                                            class="btn-floating btn-small orange pulse" href=""><i
                                                class="material-icons ">add</i></a>
                                    </p>
                                @endcan
                            </div>
                        </div>
                    @endif

                    <div class="col s12 mt-sm center-align">
                        <a href="{{ route('events.index') }}"
                            class="waves-effect waves-light btn btn-small apply-button white black-text"><i
                                class="material-icons black-text right">arrow_forward</i>All Events</a>
                    </div>
                </div>
            </div>

        </div>

        <footer class="page-footer black">
            <div class="container">
                <div class="row">

                    <div class="col l6 s12">
                        <h5 class="white-text"><img width="70px" height="70px"
                                src="{{ asset('images/logo-white-zuct.png') }}" alt=""></h5>
                        <p class="grey-text text-lighten-4 light-deca">
                            We offer a world class learning atmosphere which leads students to archieve worthwhile,
                            meaningful outstanding goals without pending inordinate time and energy.
                        </p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul class="light-deca">
                            <li><a class="grey-text text-lighten-3" href="/">Home</a></li>
                            <li><a class="grey-text text-lighten-3" href="https://www.zictcollege.ac.zm/login">Student
                                    portal</a></li>
                            <li><a class="grey-text text-lighten-3" href="{{ route('events.index') }}">Events</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="footer-copyright">
                <div class="container">
                    © 2024 Zambia University College of Technology , All rights reserved.
                    <a class="grey-text text-lighten-4 right" href="#!">
                    </a>
                </div>
            </div>
        </footer>

    </div>

</div>
