@extends('BaseApp::layouts.web-project',[$row,$SchemaType])
@section('page-title')
    {{@$row->name}}
@endsection
@section('content')


    <!-- Single Project -->
    <div class="single-project">

        <!-- Project Header -->
        <div class="project-header {{@$menu_layout}}">

            <!-- Project Image -->
            {{--            <div class="project-image project-image-full ">--}}
            {{--                <img src="{{image($row->image,'large')}}" alt="Project Header Image">--}}
            {{--            </div>--}}
            <div style="background-image: url({{image($row->image,'large')}});
                background-repeat: no-repeat;
                background-size: cover;
                height: 100%;
                width: 100%;
                display: block;
                position: relative;
                overflow: hidden;
                ">
            </div>
            <!--/ Project Image -->

            <div class="project-top">

            {{--                <!-- Project Category -->--}}
            {{--                <div data-delay=".2" class="project-work has-animation skew-down">--}}
            {{--                    Arch 360 Project--}}
            {{--                </div>--}}
            {{--                <!-- Project Category -->--}}

            <!-- Project Title -->
                <div class="project-title has-animation skew-up">
                    {{$row->name}}
                </div>
                <!-- Project Title -->
            </div>

            {{--            <!-- Project Metas -->--}}
            {{--            <div class="project-meta">--}}
            {{--                <div data-delay=".7" class="has-animation skew-up">{{@$row->sub_title}}</div>--}}
            {{--            </div>--}}
            {{--            <!-- Project Metas -->--}}

        </div>
        <!--/ Project Header ends-->


        <!-- Project Content -->
        <div class="project-content" id='sec'>

        @foreach($row->Sections as $section)
            <!-- section -->
                <div class="section" style="margin-bottom: 0px">
                    <!-- Wrapper -->
                    <div class="{{$section->wrapperType}}" style="margin-bottom: 0px">

                        @foreach($section->Components as $component)
                            @include($views.'Components.'.$component->name,$component)
                        @endforeach
                    </div>
                </div>
                <!-- Section ends-->
            @endforeach

        </div>
        @if(!empty($row->NextProject) ||!empty($row->PreviousProject) )
            <br>
            <br>

            <div class="section">
                <div class="wrapper-full">
                    <div class="row text-wrapper">
                        <div class="col-4 float-left text-left">
                            @if(!empty($row->PreviousProject))
                                <h1 class="thin" style="font-size: 2em !important; font-weight: bold;margin-left: 100px">
                                    <a class="underline" href="{{url('project',$row->PreviousProject->id)}}">
                                        Previous Project
                                    </a>
                                </h1>
                            @endif
                        </div>
                        <div class="col-4 float-right text-right">
                            @if(!empty($row->NextProject))
                                <h1 class="thin"
                                    style="font-size: 2em !important; font-weight: bold; margin-right: 100px">
                                    <a class="underline" href="{{url('project',$row->NextProject->id)}}">
                                        Next Project
                                    </a>
                                </h1>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!--/ Single Project -->




@endsection
