<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="icon" href="{{ URL::asset('/images/logo-white-zuct.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>

    <title>{{ $title ?? 'ZUT' }}</title>

</head>

<body>

    <!-- NAVBAR -->
    <header>
        <nav>
            <div class="nav-wrapper black">
                <div class="row">
                    <div class="col s12">

                        <a href="#" data-target="sidenav-1" class="left sidenav-trigger show-on-medium-and-up"><i
                                class="material-icons white-text">menu</i></a>
                        <a href="/" class="brand-logo center"><img class="responsive-img"
                                src="{{ asset('images/logo-white-zuct.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- RIGHT SIDEBAR	 -->
    <ul id="sidenav-1" class="sidenav">
        <li><a class="subheader">Administration</a></li>

        <li class="white">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">full_screen</i>Home
                        editor <i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect waves-blue" href="/manage-slider"><i
                                        class="material-icons">link</i>Manage slider</a></li>
                            <li><a class="waves-effect waves-blue" href="/edit-marketing-info"><i
                                        class="material-icons">link</i>Manage marketing</a></li>
                            <li><a class="waves-effect waves-blue" href="/create-announcement"><i
                                        class="material-icons">link</i>Add Announcement</a></li>
                            <li>
                                <div class="divider"></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li class="white">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-blue"><i
                            class="material-icons">full_screen</i>Program editor <i class="material-icons right"
                            style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect waves-blue" href="/create-admission-info"><i class="material-icons">link</i>Add
                                    admission info</a></li>
                            <li><a class="waves-effect waves-blue" href="/manage-admission-info"><i class="material-icons">link</i>
                                    Manage admission information</a></li>
                            <li>
                                <div class="divider"></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li class="white">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">full_screen</i>News
                        editor <i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect waves-blue" href="/create-news-story"><i class="material-icons">link</i>Add
                                    news</a></li>
                            <li><a class="waves-effect waves-blue" href="/manage-news"><i
                                        class="material-icons">link</i>Manage news</a></li>
                            <li>
                                <div class="divider"></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li class="white">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-blue"><i
                            class="material-icons">full_screen</i>Events editor <i class="material-icons right"
                            style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect waves-blue" href="{{ route('events.create') }}"><i
                                        class="material-icons">link</i>Add event</a></li>
                            <li><a class="waves-effect waves-blue" href="{{ route('events.manage') }}"><i
                                        class="material-icons">link</i>Manage Events</a></li>
                            <li>
                                <div class="divider"></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li class="white">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-blue"><i
                            class="material-icons">full_screen</i>About editor <i class="material-icons right"
                            style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect waves-blue" href="{{ route('about.add.banner-content') }}"><i
                                        class="material-icons">link</i>Banner</a></li>
                            <li><a class="waves-effect waves-blue"
                                    href="{{ route('about.add.info-list-content') }}"><i
                                        class="material-icons">link</i>Mission & vision</a></li>
                            <li><a class="waves-effect waves-blue" href="{{ route('about.add.main-content') }}"><i
                                        class="material-icons">link</i>ZUT Biography</a></li>
                            <li>
                                <div class="divider"></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>

        <li class="white">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header waves-effect waves-blue"><i
                            class="material-icons">full_screen</i>System Access <i class="material-icons right"
                            style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a class="waves-effect waves-blue" href="#"><i
                                        class="material-icons">link</i>Users</a></li>
                            <li>
                                <div class="divider"></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>

    <main>

        {{ $slot }}

    </main>

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
                        <li><a class="grey-text text-lighten-3" href="https://www.zictcollege.ac.zm/login">Student portal</a></li>
                        <li><a class="grey-text text-lighten-3" href="{{ route('events.index') }}">Events</a></li>
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

</body>

</html>
