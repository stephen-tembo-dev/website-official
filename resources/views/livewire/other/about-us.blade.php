<div>
    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <div class="newsbody mt mb">
                    <div class="wow fadeInDown" style="position: relative;">
                        <div
                            style="width: 100%; height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('storage/uploads/' . $banner->image_path) }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius:8px">
                            <h5 class="center white-text"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                {{ $banner->title }}</h5>
                        </div>
                    </div>

                    <p class="center"><small>{{ $banner->caption }}</small></p>

                    <div class="row">
                        <div class="col m12 s12">
                            <div class="light-deca wow fadeInUp">
                                <b class="flow-text">{{ $mainContent->title }}</b>
                                <div class="about-main-content">
                                    <p>{!! nl2br($mainContent->text) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($infoList as $item)
                <div class="col m6 s12">
                    <p class="flow-text"><b>{{ $item->title }}</b></p>
                    <p class="light-deca">
                        {!! nl2br($item->text) !!}
                    </p>
                </div>
            @endforeach

        </div>
    </div>
</div>
