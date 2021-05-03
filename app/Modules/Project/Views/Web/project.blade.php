@extends('BaseApp::layouts.web-project',[$row,$SchemaType])
@section('page-title')
    {{trans('app.Project Page')}}
@endsection
@section('content')


    <!-- Single Project -->
    <div class="single-project">

        <!-- Project Header -->
        <div class="project-header {{$SchemaType[$row->colorSchema]['menu-layout']}}">

            <!-- Project Image -->
            <div class="project-image project-image-full ">
                <img src="/images/projects/meskaline-studio/sp_head.jpg" alt="Project Header Image">
            </div>
            <!--/ Project Image -->

            <div class="project-top">

                <!-- Project Category -->
                <div data-delay=".2" class="project-work has-animation skew-down">
                    Arch 360 Project
                </div>
                <!-- Project Category -->

                <!-- Project Title -->
                <div class="project-title has-animation skew-up">
                    {{$row->name}}
                </div>
                <!-- Project Title -->

            </div>

            <!-- Project Metas -->
            <div class="project-meta">

                <div data-delay=".7" class="has-animation skew-up"><span class="pm-tit">Client: </span>Uniti</div>

                <div data-delay=".8" class="has-animation skew-up"><span class="pm-tit">Year: </span>2012</div>

                <div data-delay=".9" class="has-animation skew-up"><span class="pm-tit">Role: </span>Paper Works</div>

            </div>
            <!-- Project Metas -->

        </div>
        <!--/ Project Header ends-->


        <!-- Project Content -->
        <div class="project-content" id='sec'>

        @foreach($row->Sections as $section)
            <!-- section -->
                <div class="section">
                    <!-- Wrapper -->
                    <div class="{{$section->wrapperType}}">

                        @foreach($section->Components as $component)
                            @include($views.'Components.'.$component->name,$component)
                        @endforeach
                    </div>
                </div>
                <!-- Section ends-->
            @endforeach

        </div>

        <!-- Next Project Setion -->
        <div class="projects-nav">


            <div class="next-project">
                <!-- Next Project URL -->
                <a href="project-2.html">
                    <div class="next-project-wrapper">

                        <span class="next-project-span has-animation skew-up">Next Project</span>

                        <!-- Next Project Title -->
                        <h1 class="next-project-title has-animation skew-up">Havet</h1>
                        <!--/ Next Project Title -->
                    </div>

                    <!-- Next Project Image -->
                    <div class="next-project-image-wrapper">
                        <img src="/images/projects/havet/bs_cov.jpg" alt="Next Project Image">
                    </div>
                    <!--/ Next Project Image -->

                </a>
                <!--/ Next Project URL -->
            </div>


        </div>
        <!--/ Next Project Setion ends -->

    </div>
    <!--/ Single Project -->




@endsection
