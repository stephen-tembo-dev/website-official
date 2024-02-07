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
                                    {{ $school['name'] ?? 'No name' }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-sm">
                        <div class="col m12 s12">
                            <div class="light-deca wow fadeInUp">
                                {{-- <b class="flow-text">{{ $school['name'] ?? 'No name' }}</b> --}}
                                <div class="about-main-content">
                                    <p>{!! nl2br($school['description'] ?? 'No description') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt">
                        <b class="flow-text">Departments</b>
                        <div class="row mt-sm">
                            @if (count($departments) > 0)
                                @foreach ($departments as $department)
                                    <div class="col s12 m4">
                                        <a
                                            href="{{ route('departments.show', [$school['slug'], $department['slug']]) }}">
                                            <div class="card transparent z-depth-0"
                                                style="border-radius: 10px; overflow: hidden">
                                                <div class="card-image">
                                                    <span
                                                        style="display: inline-block; position: absolute; z-index: 4; top: 0; left: 0; width: 100%; height: 100%; background-image: linear-gradient(to top, rgba(0,0,0,.65), rgba(0,0,0,.125) 40%)">&nbsp;</span>
                                                    <img src="{{ asset('images/facilities-1.jpg') }}">
                                                    <span style="z-index: 5; text-shadow: 2px 2px 4px rgba(0,0,0,.5)"
                                                        class="card-title">{{ $department['name'] }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
