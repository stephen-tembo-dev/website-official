<div>
    <div class="container">
        <div class="mt" style="position: relative;">
            <div
                style="width: 100%; height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/banner-zuct-2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius: 8px;">
                <h5 class="center white-text"
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    News</h5>
            </div>
        </div>

        <h5 class="grey-text lighten-3 mt heading"><b>latest</b></h5>

        <div class="row">
            <div class="col m10 s12">

                <div class="card horizontal z-depth-0 small">
                    <div class="card-image">
                        <img class="responsive-img" src="{{ asset('/storage/uploads/' . $story->image_path) }}">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p class="flow-text"><b>{{$story->title}}</b></p>
                            <p class="light-deca newsbody"> {{ \Illuminate\Support\Str::limit($story->text, 230, '...') }}</p>
                            <br>
                            <a href="news-story/" class="btn btn-small black-text white apply-button" href="#">read
                                more</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <h5 class="grey-text lighten-3 mt heading"><b>more news</b></h5>

        <div class="row wow fadeIn mb">

            @foreach($news as $story)

            <div class="col s12 m4">
                <div class="card ">
                    <div class="card-image">
                        <img src="{{ asset('/storage/uploads/' . $story->image_path) }}" alt="Image">
                        <span class="card-title"></span>
                    </div>
                    <div class="card-content">
                        <p>
                            <b class="truncate">{{$story->title}}</b><br>
                        <div class="light-deca">
                            <small class="grey-text">{{$story->created_at->format('j M, Y')}}</small>
                            <br><br>
                            {{ \Illuminate\Support\Str::limit($story->text, 200, '...') }}
                        </div>
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="news-story/{{$story->id}}" class="btn btn-small black-text white apply-button"
                            href="#">read
                            more</a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>

        <p class="center">
          
        </p>

    </div>


</div>