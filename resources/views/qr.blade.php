@extends('app')

@section('content')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#fullpage').fullpage({
                sectionsColor: ['#5AB5C0', '#82C6CE', '#AEDBE0', '#C9E7EA', '#DBE7E8'],
                anchors: ['1st', '2nd', '3rd', '4th', '5th'],
                menu: '#menu',
                css3: true,
                scrollingSpeed: 1000,
                scrollBar: true,
                autoScrolling: true,
                fitToSection: false
            });
        });
    </script>
    <div id="menu">
    <ul>
        <img src="{{url('/img/freeze/logo1.png')}}" height="40"/>
        <li data-menuanchor="1st"><a href="#1st">北智捷</a></li>
        <li data-menuanchor="2nd"><a href="#2nd">桃智捷</a></li>
        <li data-menuanchor="3rd"><a href="#3rd">中智捷</a></li>
        <li data-menuanchor="4th"><a href="#4th">南智捷</a></li>
        <li data-menuanchor="5th"><a href="#5th">高智捷</a></li>
    </ul>
    </div>

    <div id="fullpage">
        <div class="section" id="section0">
            <div class="wrapper">
                <section id="vote" class="doublediagonal">
                    <div class="container">
                        <div class="section-heading scrollpoint sp-effect3">
                        </div>
                        @foreach($lists1->chunk(3) as $list3)
                            <div class="row">
                                @foreach($list3 as $list)
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="about-item scrollpoint sp-effect2"
                                             style="display:table-cell; vertical-align:middle; text-align:center">
                                            <i><a href="/store/{{ $list->id }}"><img class="img-responsive"
                                                                                     align="top"
                                                                                     src="/uploads/demo/store/{{ $list->path }}"
                                                                                     alt=""></a></i>

                                            <h3>{{ $list->name }}</h3>
                                            <BR>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
        <div class="section" id="section1">
            <div class="wrapper">
                <div class="container">
                    <div class="section-heading scrollpoint sp-effect3">
                        <br/><br/>
                    </div>
                    @foreach($lists2->chunk(3) as $list3)
                        <div class="row">
                            @foreach($list3 as $list)
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="about-item scrollpoint sp-effect2"
                                         style="display:table-cell; vertical-align:middle; text-align:center">
                                        <i><a href="/store/{{ $list->id }}"><img class="img-responsive"
                                                                                 align="top"
                                                                                 src="/uploads/demo/store/{{ $list->path }}"
                                                                                 alt=""></a></i>

                                        <h3>{{ $list->name }}</h3>
                                        <BR>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="section" id="section2">
            <div class="wrapper">
                <div class="container">
                    <div class="section-heading scrollpoint sp-effect3">
                        <br/><br/>
                    </div>
                    @foreach($lists3->chunk(3) as $list3)
                        <div class="row">
                            @foreach($list3 as $list)
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="about-item scrollpoint sp-effect2"
                                         style="display:table-cell; vertical-align:middle; text-align:center">
                                        <i><a href="/store/{{ $list->id }}"><img class="img-responsive"
                                                                                 align="top"
                                                                                 src="/uploads/demo/store/{{ $list->path }}"
                                                                                 alt=""></a></i>

                                        <h3>{{ $list->name }}</h3>
                                        <BR>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="section" id="section3">
            <div class="wrapper">
                <div class="container">
                    <div class="section-heading scrollpoint sp-effect3">
                        <br/><br/>
                    </div>
                    @foreach($lists4->chunk(3) as $list3)
                        <div class="row">
                            @foreach($list3 as $list)
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="about-item scrollpoint sp-effect2"
                                         style="display:table-cell; vertical-align:middle; text-align:center">
                                        <i><a href="/store/{{ $list->id }}"><img class="img-responsive"
                                                                                 align="top"
                                                                                 src="/uploads/demo/store/{{ $list->path }}"
                                                                                 alt=""></a></i>

                                        <h3>{{ $list->name }}</h3>
                                        <BR>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="section" id="section4">
            <div class="wrapper">
                <div class="container">
                    <div class="section-heading scrollpoint sp-effect3">
                        <br/><br/>
                    </div>
                    @foreach($lists5->chunk(3) as $list3)
                        <div class="row">
                            @foreach($list3 as $list)
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="about-item scrollpoint sp-effect2"
                                         style="display:table-cell; vertical-align:middle; text-align:center">
                                        <i><a href="/store/{{ $list->id }}"><img class="img-responsive"
                                                                                 align="top"
                                                                                 src="/uploads/demo/store/{{ $list->path }}"
                                                                                 alt=""></a></i>

                                        <h3>{{ $list->name }}</h3>
                                        <BR>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('/js/jquery.fullPage.min.js')}}"></script>
@endsection