@extends('BaseApp::layouts.web-homepage')
@section('page-title')
    {{trans('app.Home Page')}}
@endsection
@section('content')

    <!-- Big Slider Overlays (Don't Touch) -->
    <div class="big-slider-overlays"></div>
    <!--/ Big Slider Overlays (Don't Touch) -->

    <div class="big-slider">
        <div class="big-slider-wrapper">

        @forelse($rows as $element)
            <!-- Project -->
                <div class="big-slider-item" style="background: rgba(0,0,0,.5);z-index: 2">

                    <!-- Project URL -->
                    <a href="/project/{{@$element->id}}"></a>
                    <!--/ Project URL -->

                    <div class="top">
                        <!-- Project Category -->
                        <!--/ Project Category -->

                        <!-- Project Title -->
                        @if(@$site_layout==\App\Modules\Config\Enums\ConfigsEnum::DARK)
                            <div class="text-shadow " style="color:#eee">{{@$element->name}}</div>
                        @else
                            <div class="text-shadow ">{{@$element->name}}</div>

                    @endif
                    <!--/ Project Title -->
                    </div>

                {{--                    <!-- Project Summary -->--}}
                {{--                    <div class="summary" style="background: rgba(0,0,0,1); padding: 10px; color :#fff;font-size: larger">--}}
                {{--                     {{@$element->description}}--}}
                {{--                    </div>--}}
                {{--                    <!--/ Project Summary -->--}}


                <!-- Project Featured Image -->
                    <div class="image">
                        <img src="{{image($element->image , 'large')}}"
                             alt="{{@$element->name}}">
                    </div>
                    <!--/ Project Featured Image -->

                </div>
                <!--/ Project -->
            @empty
            @endforelse
        </div>
    </div>

    <!-- View Project Button -->
    <div class="big-slide-button">View Project</div>
    <!--/ View Project Button -->

    <!-- Slider Elements (Don't Touch) -->
    <div class="big-slide-pag">
        <div class="big-slide-prev"><i class="icon-up-open-big"></i></div>
        <div class="big-slide-next"><i class="icon-down-open-big"></i></div>
    </div>
    <div class="bs-bullets"></div>
    <div class="bs-splitted"></div>
    <!--/ Slider Elements (Don't Touch) -->


    <!--/Portfolio Big Carousel-->

@endsection
