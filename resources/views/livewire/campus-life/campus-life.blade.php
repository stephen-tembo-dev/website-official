<div class="container">
    <div class="row mt">
        <div class="col s12">
            <ul class="tabs mb-sm">
                <li class="tab"><a href="#campus-life">Campus Life</a></li>
                <li class="tab"><a href="#activities">Activities</a></li>
                <li class="tab"><a href="#facilities">Facilities</a></li>
            </ul>
            <div id="campus-life" class="col s12 mb">
                @if (count($mainItems) > 0)
                    @foreach ($mainItems as $index => $item)
                        <div @can('editor') class="edit-box" @endcan>
                            <div class="row mt mb valign-wrapper">
                                <div class="col s12 l6 {{ $index % 2 !== 0 ? 'push-l6' : '' }} center wow fadeIn">
                                    <img src="{{ asset('storage/uploads/' . $item->image_path) ?? asset('images/campus-life-1.jpg') }}"
                                        class="responsive-img">
                                </div>

                                <div class="col s12 l5 {{ $index % 2 !== 0 ? 'pull-l7' : '' }} offset-l1 wow fadeInUp">
                                    <h5 class="">{{ $item->title ?? 'No title' }}</h5>
                                    <p class="light-deca">
                                        {!! nl2br($item->text) ?? 'No text' !!}
                                    </p>

                                </div>
                            </div>
                            <p class="right-align">
                                <a href="{{ route('campus-life.edit-campus-life-item', $item) }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">edit</i></a>

                                @if ($index === 0)
                                    <a href="{{ route('campus-life.create-campus-life-item') }}"
                                        class="btn-floating btn-small orange pulse" href=""><i
                                            class="material-icons ">add</i></a>
                                @endif
                            </p>
                        </div>
                    @endforeach
                @else
                    <div @can('editor') class="edit-box" @endcan>
                        <div class="row mt mb valign-wrapper">
                            <div class="col s12 l6 center wow fadeIn">
                                <img src="{{ asset('images/placeholder.webp') }}" class="responsive-img">
                            </div>

                            <div class="col s12 l5 offset-l1 wow fadeInUp">
                                <h5 class="">Placeholder title</h5>
                                <p class="light-deca">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque ducimus voluptas
                                    in
                                    harum perspiciatis ab, excepturi aliquam culpa dignissimos dolorem quod esse
                                    consequuntur architecto possimus aperiam illum dicta qui repellat!
                                </p>

                            </div>
                        </div>
                        @can('editor')
                            <p class="right-align">
                                <a href="{{ route('campus-life.create-campus-life-item') }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">add</i></a>
                            </p>
                        @endcan
                    </div>
                @endif
            </div>
            <div id="activities" class="col s12 mb">
                @if (count($activities) > 0)
                    @foreach ($activities as $index => $activity)
                        <div @can('editor') class="edit-box" @endcan>
                            <div class="row mt mb valign-wrapper">
                                <div class="col s12 l6 {{ $index % 2 !== 0 ? 'push-l6' : '' }} center wow fadeIn">
                                    <img src="{{ asset('storage/uploads/' . $activity->image_path) ?? asset('images/campus-life-1.jpg') }}"
                                        class="responsive-img">
                                </div>

                                <div class="col s12 l5 {{ $index % 2 !== 0 ? 'pull-l7' : '' }} offset-l1 wow fadeInUp">
                                    <h5 class="">{{ $activity->title ?? 'No title' }}</h5>
                                    <p class="light-deca">
                                        {!! nl2br($activity->text) ?? 'No text' !!}
                                    </p>

                                </div>
                            </div>
                            <p class="right-align">
                                <a href="{{ route('campus-life.edit-campus-life-item', $activity) }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">edit</i></a>

                                @if ($index === 0)
                                    <a href="{{ route('campus-life.create-campus-life-item') }}"
                                        class="btn-floating btn-small orange pulse" href=""><i
                                            class="material-icons ">add</i></a>
                                @endif
                            </p>
                        </div>
                    @endforeach
                @else
                    <div @can('editor') class="edit-box" @endcan>
                        <div class="row mt mb valign-wrapper">
                            <div class="col s12 l6 center wow fadeIn">
                                <img src="{{ asset('images/placeholder.webp') }}" class="responsive-img">
                            </div>

                            <div class="col s12 l5 offset-l1 wow fadeInUp">
                                <h5 class="">Placeholder title</h5>
                                <p class="light-deca">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque ducimus voluptas
                                    in
                                    harum perspiciatis ab, excepturi aliquam culpa dignissimos dolorem quod esse
                                    consequuntur architecto possimus aperiam illum dicta qui repellat!
                                </p>

                            </div>
                        </div>
                        @can('editor')
                            <p class="right-align">
                                <a href="{{ route('campus-life.create-campus-life-item') }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">add</i></a>
                            </p>
                        @endcan
                    </div>
                @endif
            </div>
            <div id="facilities" class="col s12 mb">
                @if (count($facilities) > 0)
                    @foreach ($facilities as $index => $facility)
                        <div @can('editor') class="edit-box" @endcan>
                            <div class="row mt mb valign-wrapper">
                                <div class="col s12 l6 {{ $index % 2 !== 0 ? 'push-l6' : '' }} center wow fadeIn">
                                    <img src="{{ asset('storage/uploads/' . $facility->image_path) ?? asset('images/campus-life-1.jpg') }}"
                                        class="responsive-img">
                                </div>

                                <div class="col s12 l5 {{ $index % 2 !== 0 ? 'pull-l7' : '' }} offset-l1 wow fadeInUp">
                                    <h5 class="">{{ $facility->title ?? 'No title' }}</h5>
                                    <p class="light-deca">
                                        {!! nl2br($facility->text) ?? 'No text' !!}
                                    </p>

                                </div>
                            </div>
                            <p class="right-align">
                                <a href="{{ route('campus-life.edit-campus-life-item', $facility) }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">edit</i></a>

                                @if ($index === 0)
                                    <a href="{{ route('campus-life.create-campus-life-item') }}"
                                        class="btn-floating btn-small orange pulse" href=""><i
                                            class="material-icons ">add</i></a>
                                @endif
                            </p>
                        </div>
                    @endforeach
                @else
                    <div @can('editor') class="edit-box" @endcan>
                        <div class="row mt mb valign-wrapper">
                            <div class="col s12 l6 center wow fadeIn">
                                <img src="{{ asset('images/placeholder.webp') }}" class="responsive-img">
                            </div>

                            <div class="col s12 l5 offset-l1 wow fadeInUp">
                                <h5 class="">Placeholder title</h5>
                                <p class="light-deca">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque ducimus voluptas
                                    in
                                    harum perspiciatis ab, excepturi aliquam culpa dignissimos dolorem quod esse
                                    consequuntur architecto possimus aperiam illum dicta qui repellat!
                                </p>

                            </div>
                        </div>
                        @can('editor')
                            <p class="right-align">
                                <a href="{{ route('campus-life.create-campus-life-item') }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">add</i></a>
                            </p>
                        @endcan
                    </div>
                @endif
            </div>

        </div>

    </div>
</div>
