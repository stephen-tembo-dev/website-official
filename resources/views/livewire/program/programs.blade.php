<div class="container">

    <div class="row mb">
        <div class="col m9 s12">

            <h5 class="grey-text lighten-3 mt heading"><b>{{ $category }}</b></h5>

            <ul class="collapsible z-depth-0 white ">
                @foreach($programs as $p)
                    <li>
                        <div class="collapsible-header"><i class="material-icons"><span
                                    class="material-icons-outlined">expand_more</span></i>{{ $p['program_code'].' - '.$p['program_name'] }}</div>
                        <div class="collapsible-body">
                            @foreach($p['course_levels'] as $level)
                                <p><b class="flow-text">{{ $level['name'] }}</b></p>

                                <table class="highlight striped">
                                    <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Code</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($level['courses'] as $course)
                                        <tr>
                                            <td>{{ $course['name'] }}</td>
                                            <td>{!! $course['code'] !!}</td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                <br>
                            @endforeach
                        </div>
                    </li>
                @endforeach

            </ul>

        </div>

    </div>


    <h5 class="grey-text lighten-3  heading"><b>Admissions</b></h5>

    <div class="row mb">
        <div class="col m9 s12">
            <ul class="tabs">
                <li class="tab col s3"><a href="#test1">Entry requirements</a></li>
                <li class="tab col s3"><a class="active" href="#test2">How to apply</a></li>
                <li class="tab col s3"><a href="#test3">Fees and scholarship</a></li>
                <li class="tab col s3"><a href="#test4">Accomodation</a></li>
            </ul>
        </div>
        <div id="test1" class="col m9 s12">
            <br>
            <p class="light-deca">
                Minimum entry requirement is grade 12 results with 5’ O Level credits or better including Mathematics
                and English.
            </p>
        </div>
        <div id="test2" class="col m9 s12">
            <br>
            <p class="light-deca">
                Application forms for admission are available at our admissions office at a non-refundable fee of
                K150.00.
            </p>
        </div>
        <div id="test3" class="col m9 s12">
            <br>
            <p class="light-deca">
                The Zambia University College of Technology (ZUT) is the fastest growing higher learning institution in
                Zambia. The college is a government institution and is only specialized premier center of excellency for
                research and training in ICTS in Zambia.
            </p>
        </div>
        <div id="test4" class="col m9 s12">
            <br>
            <p class="light-deca">
                ZUT offers self- catering accommodation; all students are eligible to accommodation. Admission of
                Residence for new students shall be by online booking upon receipt of an admission letter and payments
                of fees. The college has limited accommodation so booking for accommodation online is based on first
                come first serve basis. Both new and returning students are given 48hrs to make payments for the
                accommodation upon booking. The college recognizes that students who are differently abled cannot
                effectively carry out the studies unless they are provided with accommodation. Priority for college
                accommodation will therefore be given to such students. This category of students will be accommodated
                on the ground floor in case of story hostels. Currently Zambia ICT college is not offering; Hostel
                facilities for couples and families, until such facilities are available.
            </p>
        </div>
    </div>

</div>
