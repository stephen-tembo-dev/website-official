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

                                <table class="highlight striped responsive-table">
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
            <div @can('editor') class="edit-box" @endcan>
            <br>
            <p class="light-deca">
                {{ $admission_infor->entry_requirements }}
            </p>

                @can('editor')
                        <p class="right-align">
                            <a href="{{ route('admission-infor',1) }}" class="btn-floating btn-small orange pulse"
                               ><i class="material-icons ">edit</i></a>
                        </p>
                @endcan

            </div>
        </div>
        <div id="test2" class="col m9 s12">
            <div @can('editor') class="edit-box" @endcan>
            <br>
            <p class="light-deca">
                {{ $admission_infor->how_to_apply }}
            </p>

            @can('editor')
                <p class="right-align">
                    <a href="{{ route('admission-infor',1) }}" class="btn-floating btn-small orange pulse"
                    ><i class="material-icons ">edit</i></a>
                </p>
            @endcan
            </div>
        </div>
        <div id="test3" class="col m9 s12">
            <div @can('editor') class="edit-box" @endcan>
            <br>
            <p class="light-deca">
                {{ $admission_infor->fees_and_scholarships }}
            </p>

            @can('editor')
                <p class="right-align">
                    <a href="{{ route('admission-infor',1) }}" class="btn-floating btn-small orange pulse"
                    ><i class="material-icons ">edit</i></a>
                </p>
            @endcan
            </div>
        </div>
        <div id="test4" class="col m9 s12">
            <div @can('editor') class="edit-box" @endcan>
            <br>
            <p class="light-deca">
                {{ $admission_infor->accomodation }}
            </p>

            @can('editor')
                <p class="right-align">
                    <a href="{{ route('admission-infor',1) }}" class="btn-floating btn-small orange pulse"
                    ><i class="material-icons ">edit</i></a>
                </p>
            @endcan
            </div>
        </div>
    </div>

</div>
