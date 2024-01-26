<div>


    <!-- carousel -->

    <div>

        <div class="slider fullscreen z-depth-0">
        <ul class="slides">
            
    @if(count($pageSliderInfo) > 0)

        @foreach($pageSliderInfo as $slider)
            <li>
                <img class="responsive-img" src="{{asset('/storage/uploads/'.$slider->image_path)}}">
                <div class="caption left-align">
                    <h3>{{$slider->title}}</h3>
                    <h5 class="light grey-text text-lighten-3">{{$slider->text}}.</h5>
                    <br>
                    @if($slider->button_name )
                        <a href="{{$slider->button_url}}" class="btn  orange darken-3 apply-button">{{$slider->button_name}}</a>
                    @endif

                    @can('editor')
                        <p class="right-align edit-pencil">
                            <a class="btn-floating btn-small orange pulse" href="/edit-slider-info/{{$slider->id}}"><i class="material-icons ">edit</i></a>
                            <a class="btn-floating btn-small orange pulse" href="/create-slider-info"><i class="material-icons ">add</i></a>
                        </p>
                    @endcan

                </div>
            </li>
        @endforeach

    @else
        <li>
            <img class="responsive-img" src="{{asset('images/placeholder.webp')}}">
            <div class="caption left-align">
                <h3>No title available</h3>
                <h5 class="light grey-text text-lighten-3">No text available</h5>
                <br>
            </div>
        </li>
    @endif
</ul>

  
        </div>
    </div>

    <div id="segment">

        <div class="container">

            <!-- Announcements -->


            <div class="row mt">

                <div class="col s12 m12 wow fadeInLeft">
                    <div class="card-panel grey lighten-5 z-depth-4">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <i class="material-icons medium red-text">campaign</i>
                            </div>
                            <div class="col s10">
                                <span class="black-text light-deca">
                                    Zambia University College of Technology (ZUT), officially opens on 22<sup>nd</sup>
                                    January , 2024.
                                    All members of staff are expected to be available to attend to returning students.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>




        <div class="container">

            <h5 class="grey-text lighten-3 mt heading"><b>our programs</b></h5>

            <div class="row wow fadeIn">
                <div class="col s12 m4">
                    <div class="card transparent z-depth-0">
                        <div class="card-image">
                            <img src="{{asset('images/black.jpg')}}">
                            <span class="card-title">Degree</span>

                        </div>
                        <div class="card-action">
                            <a href="/programs/degree" class="btn btn-small black-text white apply-button" href="#">view
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card transparent z-depth-0">
                        <div class="card-image">
                            <img src="{{asset('images/cyan.jpg')}}">
                            <span class="card-title">Diploma</span>
                        </div>
                        <div class="card-action">
                            <a href="/programs/degree" class="btn btn-small black-text white apply-button" href="#">view
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col s12 m4">
                    <div class="card transparent z-depth-0">
                        <div class="card-image">
                            <img src="{{asset('images/green.jpg')}}">
                            <span class="card-title">Certificate</span>
                        </div>
                        <div class="card-action">
                            <a href="/programs/degree" class="btn btn-small black-text white apply-button" href="#">view
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col s12 m4">
                    <div class="card transparent z-depth-0">
                        <div class="card-image">
                            <img src="{{asset('images/blue.jpg')}}">
                            <span class="card-title">Professional</span>
                        </div>
                        <div class="card-action">
                            <a href="/programs/degree" class="btn btn-small black-text white apply-button"
                                href="#">view</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div @can('editor') class="edit-box" @endcan>

            <div class="parallax-container">
                <div class="parallax">
                    @if($pageInfo)
                      <img src="{{asset('/storage/uploads/'.$pageInfo->image_path)}}">
                    @else
                    <img class="responsive-img" src="{{asset('images/placeholder.webp')}}">
                    @endif
                </div>
            </div>


            <div class="container">
                <div class="row mt">
                    <div class="col m6 s12 wow slideInLeft">
                        <h3>
                            <b>{{$pageInfo ? $pageInfo->title : 'No title available' }}</b>
                        </h3>
                        <p class="newsbody light-deca">
                            {{$pageInfo ? $pageInfo->text : 'No text available'}}
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
                            <iframe width="853" height="480" src="{{$pageInfo ? $pageInfo->video_url : ''}}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            @can('editor')
            @if($pageInfo)
                <p class="right-align">
                    <a href="edit-marketing-info/{{$pageInfo->id}}" class="btn-floating btn-small orange pulse" href=""><i class="material-icons ">edit</i></a>
                </p>
            @endif
            @endcan

        </div>

        <div class="container">


            <!--- news -->

            <h5 class="grey-text lighten-3 mt heading"><b>news</b></h5>
            <div id="news" class="section scrollspy">
                <div class="row wow fadeIn">

                    <div class="col s12 m4">
                        <div class="card ">
                            <div class="card-image">
                                <img src="{{asset('images/CLASS.jpg')}}">
                                <span class="card-title"></span>
                            </div>
                            <div class="card-content">
                                <p>
                                    <b>President visits ZUT.</b><br>
                                <div class="light-deca">
                                    <small class="grey-text">01 jan 2024</small>
                                    <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur eaque
                                    voluptatem cum, voluptas cumque molestias quod! Delectus sapiente non harum
                                    cupiditate, excepturi.
                                </div>
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="news-story/1" class="btn btn-small black-text white apply-button" href="#">read
                                    more</a>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="card ">
                            <div class="card-image ">
                                <img src="{{asset('images/CLASS.jpg')}}">
                                <span class="card-title"></span>
                            </div>
                            <div class="card-content">
                                <p>
                                    <b>ZUT introduces new programs</b><br>
                                <div class="light-deca">
                                    <small class="grey-text">01 jan 2024</small>
                                    <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur eaque
                                    voluptatem cum, voluptas cumque molestias quod! Delectus sapiente non harum
                                    cupiditate, excepturi.
                                </div>
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="news-story/1" class="btn btn-small black-text white apply-button" href="#">read
                                    more</a>
                            </div>
                        </div>
                    </div>


                    <div class="col s12 m4">
                        <div class="card ">
                            <div class="card-image">
                                <img src="{{asset('images/CLASS.jpg')}}">
                                <span class="card-title"></span>
                            </div>
                            <div class="card-content">
                                <p>
                                    <b>ZUT becomes a university.</b><br>
                                <div class="light-deca">
                                    <small class="grey-text">01 jan 2024</small>
                                    <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur eaque
                                    voluptatem cum, voluptas cumque molestias quod! Delectus sapiente non harum
                                    cupiditate, excepturi.
                                </div>
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="news-story/1" class="btn btn-small black-text white apply-button" href="#">read
                                    more</a>
                            </div>
                        </div>
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

    </div>


</div>