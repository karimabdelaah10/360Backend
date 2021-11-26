<div class="c-col-8 hide-mobile"></div>

<!-- Column -->
<div class="c-col-3 no-gap">
    <a href="{{url('project',$component->Fields[0]->value)}}">
        <!-- Image Wrapper -->
        <span class="title-line">
next project
                            </span>
        <div class="image-wrapper has-animation slide-right">
            <div class="vertical-item-title image-title ">
                            <span class="title-line">
  {{$component->getProjectById($component->Fields[0]->value)->name}}
                            </span>
            </div>
            <img src="{{image($component->getProjectById($component->Fields[0]->value)->image,'large')}}"
                 alt="Single Image" style="width: 100% !important;">
        </div>
        <!--/ Image Wrapper -->
    </a>
</div>
<!--/ Column -->
<div class="c-col-12 hide-mobile"></div>


<!-- Next Project Setion -->
{{--<div class="projects-nav">--}}
{{--    <div class="next-project">--}}
{{--        <!-- Next Project URL -->--}}
{{--        <a href="{{url('project',$component->Fields[0]->value)}}">--}}
{{--            <div class="next-project-wrapper">--}}

{{--                <span class="next-project-span has-animation skew-up">Next Project</span>--}}

{{--                <!-- Next Project Title -->--}}
{{--                <h1 class="next-project-title has-animation skew-up">--}}
{{--                    {{$component->getProjectById($component->Fields[0]->value)->name}}</h1>--}}
{{--                <!--/ Next Project Title -->--}}
{{--            </div>--}}

{{--            <!-- Next Project Image -->--}}
{{--            <div class="next-project-image-wrapper">--}}
{{--                <img src="{{image($component->getProjectById($component->Fields[0]->value)->image,'large')}}"--}}
{{--                     alt="Next Project Image">--}}
{{--            </div>--}}
{{--            <!--/ Next Project Image -->--}}

{{--        </a>--}}
{{--        <!--/ Next Project URL -->--}}
{{--    </div>--}}


{{--</div>--}}
<!--/ Next Project Setion ends -->


