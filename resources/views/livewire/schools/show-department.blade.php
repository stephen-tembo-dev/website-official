<div>
    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <div class="newsbody mt mb">
                    <div>
                        <div class="wow fadeInDown" style="position: relative;">
                            <div
                                style="width: 100%; height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/school-placeholder.png') ?? 'https://placehold.co/1000x200@2x.png?text=No+Image&font=roboto' }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius:8px">
                                <h5 class="center white-text"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    {{ $department['name'] ?? 'No name' }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-sm">
                        <div class="col m12 s12">
                            <div class="light-deca wow fadeInUp">
                                <div class="about-main-content">
                                    <p>{!! nl2br($department['description'] ?? 'No description') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mt">
                        <b class="flow-text">Programs</b>
                        <div class="row mt-sm">
                            @if (count($programs) > 0)
                                @foreach ($programs as $program)
                                    {{ 'program' }}
                                @endforeach
                            @endif
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>

    </div>
</div>
