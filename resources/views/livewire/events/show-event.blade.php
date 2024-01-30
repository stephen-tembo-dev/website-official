<div>
    <div class="container">
        <div class="row">
            <div class="col m8 s12">
                <div class="newsbody mt mb wow fadeIn">
                    <div style="position: relative;">
                        <div
                            style="width: 100%; height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('/storage/uploads/' . $event->image_path) }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius: 8px;">
                            <h5 class="center white-text"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">ZUT
                                {{ $event->title }}</h5>
                        </div>
                    </div>

                    <p class="center"><small>published on , {{ $event->created_at->format('j M, Y') }}</small></p>

                    <p class="light-deca wow fadeInUp">
                        {!! nl2br($event->text) !!}
                    </p>

                </div>
            </div>

            <div class="col m4 s12 mt">
                <div class="row">
                    <div class="col m12 s12">
                        <h5 class="wow fadeInUp">More Events</h5>

                        <table class="highlight wow slideInRight">
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>
                                            <a href="/news-event/{{ $event->id }}"
                                                class="truncate">{{ $event->title }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br><br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
