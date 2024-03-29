<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css" rel="stylesheet">

    <link rel="icon" href="{{ URL::asset('/images/logo-white-zuct.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/home-main.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>

    <title>{{ $title ?? 'ZUT' }}</title>

</head>

<body>

    <div>

        <!-- Dropdown for media -->
        <ul id="dropdown-media" class="dropdown-content">
            <li><a href="/all-news-stories">News</a></li>
            <li><a href="{{ route('events.index') }}">Events</a></li>
        </ul>

        <!-- Dropdown for research -->
        <ul id="dropdown-research" class="dropdown-content">
            <li><a href="{{ route('publications.index') }}">Publications</a></li>
            <li><a href="{{ route('departments.research') }}">Research Department</a></li>
        </ul>

        <!-- Dropdown for research -->
        <ul id="dropdown-discover" class="dropdown-content">
            <li><a href="{{ route('campus-life') }}">Campus life</a></li>
            <li><a href="{{ route('general-requirements') }}">Admission</a></li>
            <li><a href="https://www.zictcollege.ac.zm/login">Student portal</a></li>
        </ul>

        <!-- Dropdown for schools -->
        <ul id="dropdown-schools" class="dropdown-content" style="min-width: 300px">
            @php
                $schools = \Illuminate\Support\Facades\Http::get('http://127.0.0.1:8081/api/schools')->json();
            @endphp

            @if (count($schools) > 0)
                @foreach ($schools as $school)
                    <li><a href="{{ route('schools.show', $school['slug']) }}">{{ $school['name'] }}</a></li>
                @endforeach
            @endif
        </ul>

        <nav class="white z-depth-0">
            <div class="nav-wrapper container">
                <a href="/" class="brand-logo"><img class="responsive-img"
                        src="{{ asset('images/logo-white-zuct.png') }}" alt=""></a>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i
                        class="material-icons menu-icon">menu</i></a>
                <ul class="right hide-on-med-and-down nav-options">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About</a></li>
                    @auth
                        <li><a href="/dashboard">Dashboard</a></li>
                    @endauth

                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-media">Media<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-schools">Schools<i
                                class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-research">Research &
                            innovation<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-discover">Discover<i
                                class="material-icons right">arrow_drop_down</i></a></li>

                    <li><a href="/contact">Contact</a></li>
                    @auth
                        <li><a class="black-text" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li><a href="/login">Sign in</a></li>
                    @endauth
                    <li><a class="btn white-text black apply-button" href="https://www.zictcollege.ac.zm/register">Apply
                            now</a></li>
                </ul>
            </div>
        </nav>

    </div>

    <ul class="sidenav" id="mobile-nav">
        <li>
            <a href="#" data-target="mobile-nav" class="sidenav-close">
                <i class="material-icons menu-icon">menu</i>
            </a>
        </li>
        <li><a href="/">Home</a></li>
        @auth
            <li><a href="/dashboard">Dashboard</a></li>
        @endauth
        <li><a href="/all-news-stories">News</a></li>
        <li><a href="{{ route('events.index') }}">Events</a></li>
        <li><a href="/about-us">About</a></li>
        <li><a href="/contact">Contact</a></li>
        @auth
            <li><a class="black-text" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                    out</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <li><a href="/login">Sign in</a></li>
        @endauth
        <li><a class="btn white-text black apply-button" href="">Apply now</a></li>
    </ul>

    <main>

        {{ $slot }}

    </main>

</body>

</html>
