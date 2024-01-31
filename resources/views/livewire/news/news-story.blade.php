<div>
    <div class="container">
        <div class="row">
            <div class="col m8 s12">
                <div class="newsbody mt mb wow fadeIn">
                    <div style="position: relative;">
                    <div style="width: 100%; height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('/storage/uploads/' . $story->image_path) }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius: 8px;">
                            <h5 class="center white-text"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                {{$story->title}}</h5>
                        </div>
                    </div>

                    <p class="center"><small>published on , {{$story->created_at->format('j M, Y')}}</small></p>

                    <p class="light-deca wow fadeInUp">
                        {!! nl2br($story->text) !!}
                    </p>

                </div>

                @if($story->attachment_path)
                  <a wire:click="downloadFile()" class="waves-effect waves-light btn black apply-button btn-small"><i class="material-icons right">attach_file</i>download attachment</a>
                @endif
            </div>

            <div class="col m4 s12 mt">
                <div class="row">
                    <div class="col m12 s12">
                        <h5 class="wow fadeInUp">More news</h5>

                        <table class="highlight wow slideInRight">
                            <tbody>
                                @foreach($other_stories as $other_story)
                                <tr>
                                    <td><a href="/news-story/{{$other_story->id}}" class="truncate">{{$other_story->title}}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br><br><br>

                    </div>
                    <div class="col m12 s12">
                        @if($story->video_url)
                        <div class="video-container">
                            <iframe width="853" height="480" src="{{ $story->video_url }}"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
