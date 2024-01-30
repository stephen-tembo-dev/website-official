<div>
    <div class="container">
        <div class="row">
            <div class="col m12 s12">
                <div class="newsbody mt mb">
                    <div @can('editor') class="edit-box mb" @endcan>
                        <div class="wow fadeInDown" style="position: relative;">
                            @php
                                $bannerImgUrl = $banner?->image_path ? asset('storage/uploads/' . $banner->image_path) : 'https://placehold.co/1000x200@2x.png?text=No+Image&font=roboto';
                            @endphp
                            <div
                                style="width: 100%; height: 200px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ $bannerImgUrl }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: relative; border-radius:8px">
                                <h5 class="center white-text"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    {{ $banner->title ?? 'About Us' }}</h5>
                            </div>
                            <p class="center">
                                <small>{{ $banner->caption ?? 'Zambia University College of Technology' }}</small>
                            </p>
                        </div>

                        @can('editor')
                            @if ($banner)
                                <p class="right-align">
                                    <a href="{{ route('about.edit.banner-content', $banner) }}"
                                        class="btn-floating btn-small orange pulse" href=""><i
                                            class="material-icons ">edit</i></a>
                                </p>
                            @else
                                <p class="right-align">
                                    <a href="{{ route('about.add.banner-content') }}"
                                        class="btn-floating btn-small orange pulse" href=""><i
                                            class="material-icons ">add</i></a>
                                </p>
                            @endif
                        @endcan
                    </div>

                    <div class="row">
                        <div class="col m12 s12">
                            <div @can('editor') class="edit-box mb" @endcan>
                                <div class="light-deca wow fadeInUp">
                                    <b class="flow-text">{{ $mainContent->title ?? 'About Us' }}</b>

                                    @php
                                        $mainContentTextAlt = "Zambia University College of Technology stands at the forefront of academic excellence, offering a diverse range of programs in engineering, technology, and business. Established with a vision to propel Zambia into the technological era, the university is committed to fostering a culture of innovation and cutting-edge education. Through rigorous academic curricula and state-of-the-art facilities, the institution aims to equip students with the skills and knowledge necessary to thrive in dynamic and rapidly evolving fields.
    
                                        The university's significant contribution to the tech scene in Zambia has been pivotal in shaping the nation's technological landscape. By offering specialized programs in engineering and technology, Zambia University College of Technology has played a crucial role in addressing the demand for skilled professionals in these sectors. Graduates from the university have become key contributors to various industries, driving innovation, and leading transformative projects that contribute to the country's economic growth. The university's emphasis on practical, hands-on learning ensures that students are well-prepared to apply theoretical knowledge to real-world challenges.
    
                                        Beyond academic pursuits, Zambia University College of Technology is renowned for its commitment to nurturing talent. The institution actively engages students in research, projects, and internships, providing them with opportunities to apply their skills in practical settings. Faculty members, with their industry experience, guide students in honing their talents, fostering a dynamic learning environment. Through mentorship programs and collaboration with industry leaders, the university creates a supportive ecosystem that encourages students to explore their potential, fostering a generation of skilled professionals ready to make significant contributions to Zambia's technological advancement.
                                        ";
                                    @endphp

                                    <div class="about-main-content">
                                        <p>{!! nl2br($mainContent->text ?? $mainContentTextAlt) !!}</p>
                                    </div>
                                </div>

                                @can('editor')
                                    @if ($mainContent)
                                        <p class="right-align">
                                            <a href="{{ route('about.edit.main-content', $mainContent) }}"
                                                class="btn-floating btn-small orange pulse" href=""><i
                                                    class="material-icons ">edit</i></a>
                                        </p>
                                    @else
                                        <p class="right-align">
                                            <a href="{{ route('about.add.main-content') }}"
                                                class="btn-floating btn-small orange pulse" href=""><i
                                                    class="material-icons ">add</i></a>
                                        </p>
                                    @endif
                                @endcan
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @if (count($infoList) > 0)
                @foreach ($infoList as $index => $item)
                    <div class="col m6 s12">
                        <div @can('editor') class="edit-box mb" @endcan>
                            <p class="flow-text"><b>{{ $item->title }}</b></p>
                            <p class="light-deca">
                                {!! nl2br($item->text) !!}
                            </p>

                            @can('editor')
                                <p class="right-align">
                                    <a href="{{ route('about.edit.info-list-content', $item->id) }}"
                                        class="btn-floating btn-small orange pulse" href=""><i
                                            class="material-icons ">edit</i></a>

                                    @if ((count($infoList)) === 1)
                                        <a href="{{ route('about.add.info-list-content') }}"
                                            class="btn-floating btn-small orange pulse" href=""><i
                                                class="material-icons ">add</i></a>
                                    @endif
                                </p>
                            @endcan
                        </div>

                    </div>
                @endforeach
            @else
                <div class="col m6 s12">
                    <div @can('editor') class="edit-box mb" @endcan>
                        <p class="flow-text"><i class="material-icons">flag</i> <b>Our mission </b></p>
                        <p class="light-deca">
                            To Provide Training and Solutions That Produce Graduates with Outstanding Technological
                            Skills
                            in
                            Southern Africa through an Enabling Learning Environment.
                        </p>

                        @can('editor')
                            <p class="right-align">
                                <a href="{{ route('about.add.info-list-content') }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">add</i></a>
                            </p>
                        @endcan
                    </div>

                </div>

                <div class="col m6 s12">
                    <div @can('editor') class="edit-box mb" @endcan>
                        <p class="flow-text"><i class="material-icons">remove_red_eye</i> <b>Our vision </b></p>
                        <p class="light-deca">
                            To Be an Institution of Choice in innovation, ICT Talent Training and Smart Solutions in
                            Southern
                            Africa.
                        </p>

                        @can('editor')
                            <p class="right-align">
                                <a href="{{ route('about.add.info-list-content') }}"
                                    class="btn-floating btn-small orange pulse" href=""><i
                                        class="material-icons ">add</i></a>
                            </p>
                        @endcan
                    </div>

                </div>
            @endif

        </div>
    </div>
</div>
