<div>
    <div class="container">
        <div class="row">
            <div class="col m8 s12">
                <div class="newsbody mt mb wow fadeIn">
                    <div style="position: relative;">
                        <div
                            style="width: 100%; height: 200px; background-image: url('{{ asset('/storage/uploads/' . $event->image_path) }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius: 8px;">
                        </div>
                    </div>

                    <div>
                        <h5 class="">{{ $event->title }}</h5>

                        <div class="mb-sm mt-sm">
                            <p>
                                <b>Event Date:</b> {{ \Carbon\Carbon::create($event->date)->format('j M, Y') }}
                            </p>
                            <p>
                                <b>Event Venue:</b> {{ $event->venue }}
                            </p>
                            <p>
                                <b>Published On:</b> {{ $event->created_at->format('j M, Y') }}
                            </p>
                        </div>

                        <p class="light-deca wow fadeInUp">
                            {!! nl2br($event->text) !!}
                        </p>

                    </div>

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
                                            <a href="{{ route('events.show', $event) }}"
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
