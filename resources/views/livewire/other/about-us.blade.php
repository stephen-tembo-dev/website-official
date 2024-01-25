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

            <div class="col m6 s12">
                <p class="flow-text"><i class="material-icons">flag</i> <b>Our mission </b></p>
                <p class="light-deca">
                    To Provide Training and Solutions That Produce Graduates with Outstanding Technological Skills in
                    Southern Africa through an Enabling Learning Environment.
                </p>
            </div>
            <div class="col m6 s12">
                <p class="flow-text"><i class="material-icons">remove_red_eye</i> <b>Our vision </b></p>
                <p class="light-deca">
                    To Be an Institution of Choice in innovation, ICT Talent Training and Smart Solutions in Southern
                    Africa.
                </p>
            </div>

        </div>
    </div>
</div>
