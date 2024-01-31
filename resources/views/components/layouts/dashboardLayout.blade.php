<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css" rel="stylesheet">

    <link rel="icon" href="{{ URL::asset('/images/logo-white-zuct.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('js/init.js')}}"></script>

    <title>{{ $title ?? 'ZUT' }}</title>

</head>

<body>

    <div>



    <nav>
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
      <a href="https://codepen.io/collection/nbBqgY/" class="brand-logo" target="_blank">Materialize Framework</a>
      <ul class="right hide">
        <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Sass</a></li>
        <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Components</a></li>
        <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Javascript</a></li>
        <li><a href="https://codepen.io/collection/nbBqgY/" target="_blank">Mobile</a></li>
      </ul>
      
      <ul class="side-nav grey darken-2" id="mobile-demo">
        
        
        <li class="sidenav-header blue">
          <div class="row">
            <div class="col s4">
                <img src="https://gravatar.com/avatar/961997eb7fd5c22b3e12fb3c8ca14e11?s=80&d=https://codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png" width="48px" height="48px" alt="" class="circle responsive-img valign profile-image">
            </div>
            <div class="col s8">
                <a class="btn-flat dropdown-button waves-effect waves-light white-text" href="#" data-activates="profile-dropdown">Jay<i class="mdi-navigation-arrow-drop-down right"></i></a>
                <ul id="profile-dropdown" class="dropdown-content">
                    <li><a href="#"><i class="material-icons">person</i>Profile</a></li>
                    <li><a href="#"><i class="material-icons">settings</i>Setting</a></li>
                    <li><a href="#"><i class="material-icons">help</i>Help</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="material-icons">lock</i>Lock</a></li>
                    <li><a href="#"><i class="material-icons">exit_to_app</i>Logout</a></li>
                </ul>
            </div>
          </div>
        </li>
        
        <li class="blue">
          <ul class="collapsible collapsible-accordion">
              <li>
                <a class="collapsible-header white-text waves-effect waves-blue "><i class="material-icons white-text ">language</i>Language <i class="material-icons right white-text" style="margin-right:0;">arrow_drop_down</i></a>
                <div class="collapsible-body z-depth-3">
                  <ul>
                    <li><a class="waves-effect waves-blue" href="#">English</a></li>
                    <li><a class="waves-effect waves-blue" href="#">العربية</a></li>
                    <li><a class="waves-effect waves-blue" href="#">中文</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Čeština</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Nederlands</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Français</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Deutsch</a></li>
                    <li><a class="waves-effect waves-blue" href="#">한국어</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Português</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Русский</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Español</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Svenska</a></li>
                    <li><a class="waves-effect waves-blue" href="#">ภาษาไทย</a></li>
                    <li><a class="waves-effect waves-blue" href="#">Türkçe</a></li>
                    <li><div class="divider"></div></li>
                  </ul>
                </div>
              </li>
          </ul>
        </li>
        
        
        
        <li class="white">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">folder_special</i>Layouts <i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a class="waves-effect waves-blue" href="#"><i class="material-icons">fullscreen</i>Full Screen<span class="new badge right yellow grey lighten-1" data-badge-caption="updated"></span></a></li>
                  <li><a class="waves-effect waves-blue" href="#"><i class="material-icons">swap_horiz</i>Horizontal Menu<span class="new badge right yellow darken-3"></span></a></li>
                  <li><div class="divider"></div></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="white">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">folder_open</i>A submenu <i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a class="waves-effect waves-blue" href="#"><i class="material-icons">fullscreen</i>Full Screen</a></li>
                  <li><a class="waves-effect waves-blue" href="#"><i class="material-icons">swap_horiz</i>Horizontal Menu</a></li>
                  <li><div class="divider"></div></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">mail</i>Menu item</a></li>
        <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">call</i> Menu item</a></li>
        <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">android</i> Menu item</a></li>
        <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">dialpad</i> Menu item</a></li>
        <li class="white"><div class="divider"></div></li>
        <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">language</i> Menu item<span class="new badge right yellow darken-3"></span></a></li>
        
        <li class="sidenav-footer grey darken-2">
          <div class="row">  
            <div class="social-icons">
              <div class="col s2">
                <a href="https://jay.holtslander.ca/?utm_source=codepen&utm_medium=pen-link"><i class="fa fa-lg fa-linkedin-square"></a></i>
              </div>
              <div class="col s2">
                <a href="https://jay.holtslander.ca/?utm_source=codepen&utm_medium=pen-link"><i class="fa fa-lg fa-facebook-official"></a></i>
              </div>
              <div class="col s2">
                <a href="https://jay.holtslander.ca/?utm_source=codepen&utm_medium=pen-link"><i class="fa fa-lg fa-twitter"></a></i>
              </div>
              <div class="col s2">
                <a href="https://jay.holtslander.ca/?utm_source=codepen&utm_medium=pen-link"><i class="fa fa-lg fa-google-plus"></a></i>
              </div>
              <div class="col s2">
                <a href="https://jay.holtslander.ca/?utm_source=codepen&utm_medium=pen-link"><i class="fa fa-lg fa-pinterest"></a></i>
              </div>
              <div class="col s2">
                <a href="https://jay.holtslander.ca/?utm_source=codepen&utm_medium=pen-link"><i class="fa fa-lg fa-youtube"></a></i>
              </div>
            </div>
          </div>
        </li>
      </ul>
      
    </div>
  </nav>

<div class="container">
  <p>Sidenav inspiration. I ended up using this on <a href="https://jay.holtslander.ca/?utm_source=codepen&utm_medium=pen-link" target="_blank">my own website</a>.</p>
</div>

<!-- Gitter Chat Link -->
<div class="fixed-action-btn"><a class="btn-floating btn-large red" href="https://gitter.im/Dogfalo/materialize" target="_blank"><i class="large material-icons">chat</i></a></div>



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
                        <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Student portal</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Announcements</a></li>
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