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

                                    @if (($index === count($infoList)) === 1)
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

        <div id="tree"></div>


    </div>
</div>

@script 
<script>

/*
let chart = new OrgChart(document.getElementById("tree"), {
  mouseScrool: OrgChart.action.ctrlZoom,
  template: "olivia",
  nodeBinding: {
    field_0: "name",
    field_1: "title",
    img_0: "img"
  },
  nodes: [
    {
      id: 1,
      tags: ["Exective Director"],
      name: "Shitima Betty",
      title: "Executive Director",
      img: "{{asset('images/ED.jpg')}}"
    },
    {
      id: 2,
      pid: 1,
      name: "Mike Siyangwe",
      title: "Director SMART",
      img: "{{asset('images/ED2.jpg')}}"
    },
    {
      id: 3,
      pid: 1,
      tags: "",
      name: "Caine Kapasa",
      title: "Direct Academics",
      img: "{{asset('images/ED3.jpg')}}"
    },
    {
      id: 4,
      pid: 1,
      name: "Elliot Mudunda",
      title: "Director Finance",
      img: "{{asset('images/ED4.jpg')}}"
    },
    {
      id: 5,
      pid: 1,
      name: "Fred Gondwe",
      title: "Director Marketing",
      img: "{{asset('images/ED5.jpg')}}"
    }

  ]
});
*/

OrgChart.templates.split = Object.assign({}, OrgChart.templates.ana);
OrgChart.templates.split.size = [10, 10];
OrgChart.templates.split.node = '<circle cx="5" cy="5" r="5" fill="none" stroke-width="1" stroke="#ED9422"></circle>';

OrgChart.templates.myTemplate = Object.assign({}, OrgChart.templates.ana);
OrgChart.templates.myTemplate.size = [140, 180];
OrgChart.templates.myTemplate.node = '<rect x="0" y="0" width="140" height="180"  fill="#044B94" fill-opacity="0" stroke="none"></rect>' +
    '<circle cx="70" cy="60" r="60" fill="white"></circle>' +
    '<circle cx="70" cy="-25" r="8" fill="white" stroke-width="1" stroke="#ED9422"></circle>' +
    '<circle cx="70" cy="-25" r="3.5" fill="#ED9422"></circle>' +
    '<circle cx="70" cy="60" fill="#ffffff" r="40"></circle>' +
    '<circle stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD" cx="70" cy="40" r="13"></circle>' +
    '<path d="M40,83 C40,49 100,49 100,83" stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD"></path>';

OrgChart.templates.myTemplate.ripple = {
    radius: 60,
    color: "red",
    rect: { x: 10, y: 0, width: 120, height: 120 }
};

OrgChart.templates.myTemplate.img_0 =
    '<clipPath id="ulaImg">'
    + '<circle cx="70" cy="60" r="40"></circle>'
    + '</clipPath>'
    + '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" x="30" y="20" width="80" height="80">'
    + '</image>';

OrgChart.templates.myTemplate.field_0 = '<text style="font-size: 16px;" fill="#ED9422" x="70" y="150" text-anchor="middle">{val}</text>';
OrgChart.templates.myTemplate.field_1 = '<text style="font-size: 10px;" fill="grey" x="70" y="170" text-anchor="middle">{val}</text>';

OrgChart.templates.myTemplate.link =
    '<path stroke-linejoin="round" stroke="#ED9422" stroke-width="1px" fill="none" d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}" />';

OrgChart.templates.myTemplate.plus = '';

OrgChart.templates.myTemplate.minus = '';


OrgChart.templates.myTemplateRoot = Object.assign({}, OrgChart.templates.myTemplate);
OrgChart.templates.myTemplateRoot.node = '<rect x="0" y="0" width="140" height="180"  fill="#044B94" fill-opacity="0" stroke="none"></rect>' +
    '<circle cx="70" cy="60" r="60" fill="#4D4D4D"></circle>' +
    '<circle cx="70" cy="60" fill="#ffffff" r="40"></circle>' +
    '<circle stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD" cx="70" cy="40" r="13"></circle>' +
    '<path d="M40,83 C40,49 100,49 100,83" stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD"></path>';

OrgChart.templates.myTemplateOrange = Object.assign({}, OrgChart.templates.myTemplate);
OrgChart.templates.myTemplateOrange.node = '<rect x="0" y="0" width="140" height="180"  fill="#044B94" fill-opacity="0" stroke="none"></rect>' +
    '<circle cx="70" cy="60" r="60" fill="#ED9422"></circle>' +
    '<circle cx="70" cy="-25" r="8" fill="white" stroke-width="1" stroke="#ED9422"></circle>' +
    '<circle cx="70" cy="-25" r="3.5" fill="#ED9422"></circle>' +
    '<circle cx="70" cy="60" fill="#ffffff" r="40"></circle>' +
    '<circle stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD" cx="70" cy="40" r="13"></circle>' +
    '<path d="M40,83 C40,49 100,49 100,83" stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD"></path>';

OrgChart.templates.myTemplateOrange.ripple = {
    radius: 60,
    color: "#4D4D4D",
    rect: { x: 10, y: 0, width: 120, height: 120 }
};

OrgChart.templates.myTemplateBrown = Object.assign({}, OrgChart.templates.myTemplate);
OrgChart.templates.myTemplateBrown.node = '<rect x="0" y="0" width="140" height="180"  fill="#044B94" fill-opacity="0" stroke="none"></rect>' +
    '<circle cx="70" cy="60" r="60" fill="#775E3B"></circle>' +
    '<circle cx="70" cy="-25" r="8" fill="white" stroke-width="1" stroke="#ED9422"></circle>' +
    '<circle cx="70" cy="-25" r="3.5" fill="#ED9422"></circle>' +
    '<circle cx="70" cy="60" fill="#ffffff" r="40"></circle>' +
    '<circle stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD" cx="70" cy="40" r="13"></circle>' +
    '<path d="M40,83 C40,49 100,49 100,83" stroke="#D7DBDD" stroke-width="3" fill="#D7DBDD"></path>';

OrgChart.templates.myTemplateBrown.ripple = {
    radius: 60,
    color: "#ED9422",
    rect: { x: 10, y: 0, width: 120, height: 120 }
};


var chart = new OrgChart(document.getElementById("tree"), {
    mouseScrool: OrgChart.none,
    enableSearch: false,
    mode: 'dark',
    template: "myTemplate",
    levelSeparation: 50,
    siblingSeparation: 10,
    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img"
    },
    tags: {
        root: {
            template: "myTemplateRoot"
        },
        orange: {
            template: "myTemplateOrange"
        },
        brown: {
            template: "myTemplateBrown"
        }
    }

});

nodes = [
    {
      id: 1,
      tags: ["Exective Director"],
      name: "Shitima Bweupe",
      title: "Executive Director",
      Qualifications: "PhD, Msc, Bsc",
      img: "{{asset('images/ED.jpg')}}"
    },
    {
      id: 2,
      pid: 1,
      name: "Gabriel Musonda",
      title: "Head Academics",
      Qualifications: "PhD, Msc, Bsc",
      img: "{{asset('images/ED2.jpg')}}"
    },
    {
      id: 3,
      pid: 1,
      tags: "",
      name: "Mushanga",
      title: "Head Finance",
      Qualifications: "PhD, Msc, Bsc",
      img: "{{asset('images/ED3.jpg')}}"
    },
    {
      id: 4,
      pid: 1,
      name: "Geofrey Mumba",
      title: "Director Marketing",
      Qualifications: "PhD, Msc, Bsc, Dip",
      img: "{{asset('images/ED4.jpg')}}"
    },
    {
      id: 5,
      pid: 1,
      name: "John Silungwe",
      title: "Director SMART",
      Qualifications: "Msc, Bsc",
      img: "{{asset('images/ED5.jpg')}}"
    }
];

chart.load(nodes);
</script>
@endscript
