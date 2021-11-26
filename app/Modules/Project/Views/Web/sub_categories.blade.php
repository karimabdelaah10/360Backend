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
                <div class="text-wrapper has-animation skew-up">
                    {{--                    <div class="caption">OUR WORKS</div>--}}
                    <h1 style="font-size: 92px" class="big-title">
                        {{$parent->name}} <br>Sub Categories
                    </h1>

                </div>
                <!--/ Text Wrapper -->

            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper (Small) -->

    </div>
    <!--/ Section -->

    <!-- Section -->
    <div class="section">

        <!-- Wrapper (Fullwidth) -->
        <div class="wrapper-full">

            <!-- Column -->
            <div class="c-col-12 no-gap">

                <!-- Portfolio Grid -->
                <div class="portfolio-grid">

                    <div class="pg-sizer"></div>

                    <!-- Sub Category -->
                    @forelse($rows as $row)
                        <div data-scroll class="grid-project">

                            <!-- Project URL --><a href="/category-projects/{{$row->id}}">

                                <!-- Project Meta -->
                                <div class="grid-project-meta">
                                    <!-- Project Title-->
                                    <div class="grid-project-title"
                                         style="font-size: 1.5em !important; max-width: 600px !important; line-height: 30px !important;">
                                        {{$row->name}}
                                    </div>
                                    <!--/ Project Title-->
                                </div>
                                <!--/ Project Meta-->

                                <!-- Project Image-->
                                <div class="grid-project-image">

                                    <img src="{{image($row->image , 'large')}}" alt="Grid Project Image">

                                </div>
                                <!--/ Project Image-->
                            </a>

                        </div>
                @empty
                @endforelse
                <!--/ Sub Category -->

                </div>
                <!--/ Portfolio Grid -->

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
            <div class="c-col-12 align-center">
                <div class="caption has-animation skew-up">SEE SOMETHING MORE</div>
                <h1 data-delay="0.2" class="big-title has-animation skew-up"><a href="/aboutus" class="underline">About
                        Us</a></h1>

                <span class="pe-empty-space" style="height: 100px"></span>
            </div>
            <!--/ Column -->

        </div>
        <!--/ Wrapper -->

    </div>
    <!--/ Section -->

@endsection
