@extends('BaseApp::layouts.web')
@section('page-title')
    {{@$page_title}}
@endsection
@section('content')

    <!-- Section -->
    <div class="section">

        <!-- Wrapper (Small) -->
        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-12">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div class="caption has-animation skew-up">ABOUT THE AGENCY</div>
                    <h1 class="big-title has-animation skew-up">
                        {{$rows['about_us_page_title']}}.
                    </h1>
                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->

            <div class="c-col-4 hide-mobile"></div>

            <!-- Column -->
            <div class="c-col-8">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <p data-delay="0.4" class="big-p has-animation lines-up">
                   {{$rows['about_us_page_description']}}
                    </p>
                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->


    </div>
    <!--/ Section -->

    <!-- Section -->
    <div class="section">

        <!-- Wrapper -->
        <div class="wrapper">

            <!-- Column -->
            <div class="c-col-12 has-animation fade-in-up">

                <!-- Embed Video -->
                <div class="pe-embed-video">
                    <div class="pe-video"
                         data-plyr-provider="youtube"
                         data-plyr-embed-id="{{$rows['youtube_video_embed_id']}}">

                    </div>
                </div>
                <!--/ Embed Video -->

            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

    </div>
    <!--/ Section -->

    <!-- Section -->
    <div class="section">

        <!-- Wrapper -->
        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-6">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div data-delay="0.5" class="caption has-animation skew-up">OUR SERVICES</div>
                    <h1 class="big-title has-animation skew-up">{{$rows['services_title']}}</h1>
                </div>
                <!-- Text Wrapper -->

            </div>
            <!--/ Column -->

            <!-- Column -->
            <div class="c-col-6">

                <span class="pe-empty-space" style="height: 300px"></span>

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <h4 class="thin has-animation lines-up">
                  {{$rows['services_description']}}
                    </h4>
                </div>
                <!--/ Text Wrapper -->

                <!-- Accordion -->
                <div class="c-accordion">
                    <div class="accordion-list">
                        <ul>
                            @forelse($services as $service)
                                <li class="accordion-title">{{$service->title}}
                                    <p class="accordion-content"> {{$service->description}} </p>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!--/ Accordion -->

            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

    </div>
    <!--/ Section -->

    <!-- Section -->
    <div class="section" data-background="#0b0b0b">

        <!-- Wrapper -->
        <div class="wrapper-small">

            <div class="c-col-6 hide-mobile"></div>

            <!-- Column -->
            <div class="c-col-6">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div style="color: #ededed" class="caption has-animation skew-up">THE TARGET</div>
                    <h1 style="color: #ededed" class="big-title has-animation skew-up">
                        {{$rows['mission_title']}}
                    </h1>

                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->

            <!-- Column -->
            <div class="c-col-8">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div style="color: #ededed" class="caption has-animation skew-up">OUR MISSION</div>
                    <h4 style="color: #ededed" class="thin has-animation lines-up">
                    {{$rows['mission_description']}}
                    </h4>

                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

        <!-- Wrapper -->
        <div class="wrapper-full">

            <!-- Column -->
            <div class="c-col-12 no-gap">

                <!-- Image Wrapper -->
                <div class="image-wrapper send-back">
                    <img src="/assets/Web/images/aboutus.jpg" alt="Single Image">
                </div>
                <!--/ Image Wrapper -->

            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

        <!-- Wrapper -->
        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-8">

                <!-- Text Wrapper -->
                <div class="text-wrapper">
                    <div style="color: #ededed" class="caption has-animation skew-up">OUR VISION</div>
                    <h3 style="color: #ededed" class="thin has-animation lines-up">
                     {{$rows['vision_description']}}
                     </h3>
                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

    </div>
    <!-- Section -->

    <!--/ Section -->
    <div class="section">

        <!-- Wrapper -->
        <div class="wrapper-small">

            <!-- Column -->
            <div class="c-col-12 align-center">
                <div class="caption has-animation skew-up">WHAT WE DID BEFORE</div>
                <h1 data-delay="0.2" class="big-title has-animation skew-up">
                    <a href="works.html" class="underline">Works</a></h1>
            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

    </div>
    <!--/ Section -->

@endsection
