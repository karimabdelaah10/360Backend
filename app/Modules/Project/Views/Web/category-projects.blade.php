@extends('BaseApp::layouts.web')
@section('page-title')
    {{@$page_title}}
@endsection
@section('content')


    <!-- Page Settings -->
    <div class="page-settings" data-layout="{{@$site_layout ?? 'dark'}}"
         data-header-style="{{@$menu_layout ?? 'light'}}"
         data-menu-layout="{{@$menu_layout ?? 'light'}}"></div>
    <!--/ Page settings -->

    <!-- Journal -->
    <div class="pe-journal">

        <!-- Background Text -->
        <div class="j-back">Projects</div>
        <!--/ Background Text -->

        <!-- Blog Posts -->
        <div class="pe-blog-posts">

            <!-- Post Sizer and Gutter (Don't Touch) -->
            <div class="pe-blog-sizer"></div>
            <div class="pe-blog-gutter"></div>
            <!-- Post Sizer and Gutter (Don't Touch) -->

            <!-- Blog Page Title -->
            <div class="pe-blog-stamp">
                <div class="blog-page-title has-animation skew-up">Projects</div>
            </div>
            <!-- Blog Page Title -->
            <!-- Post (Sticky) -->
            @forelse($rows as $row)
                <div class="pe-post @if($loop->first) sticky @endif">
                    <!-- Post URL --><a href="{{route('getProject', $row->id)}}">

                        <!-- Post Image -->
                        <div class="pe-post-featured">
                            <img src="{{image($row->image , 'large')}}" alt="Project Image">
                        </div>
                        <!--/ Post Image -->

                        <!-- Post -->
                        <div class="post-meta">

                            <!-- Post Category -->
                            <div class="post-cat">{{@$category->name}}</div>
                            <!--/ Post Category -->

                            <!-- Post Title -->
                            <div class="post-title">
                                {{$row->name}}.
                            </div>
                            <!--/ Post Title -->

                        </div>
                        <!--/ Post Meta -->

                    </a>
                </div>
        @empty
        @endforelse
        <!--/ Post (Sticky) -->
        </div>
        <!--/ Blog Posts -->

    </div>
    <!--/ Journal -->



    {{--    <!-- Titles (Don't Touch) -->--}}
    {{--    <div class="list-titles"></div>--}}
    {{--    <!-- Titles (Don't Touch) -->--}}

    {{--    <!-- List Projects -->--}}
    {{--    <div class="list-images">--}}
    {{--        <div class="swiper-wrapper">--}}

    {{--            @forelse($rows  as $element)--}}
    {{--            <!-- Project -->--}}
    {{--            <div class="list-image swiper-slide">--}}

    {{--                <!-- Project URL -->--}}
    {{--                <a href="/project/{{$element->id}}"></a>--}}
    {{--                <!--/ Project URL -->--}}

    {{--                <!-- Project Title -->--}}
    {{--                <div class="list-p-title">{{@$element->name}}</div>--}}
    {{--                <!--/ Project Title -->--}}

    {{--                <!-- Project Metas -->--}}
    {{--                <div class="list-titles-meta">--}}
    {{--                    <span>{{@$element->description}}</span>--}}
    {{--                </div>--}}
    {{--                <!--/ Project Metas -->--}}

    {{--                <!-- Project image -->--}}
    {{--                <div class="list-image-wrapper">--}}
    {{--                    <img src="{{image($element->image , 'large')}}" alt="List Project Image">--}}
    {{--                </div>--}}
    {{--                <!--/ Project Image -->--}}

    {{--            </div>--}}
    {{--            <!--/ Project -->--}}
    {{--            @empty--}}
    {{--            @endforelse--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!--/ List Projects -->--}}

    {{--    <!-- Page Elements -->--}}
    {{--    <div class="list-titles-fraction">--}}
    {{--        <span class="lt-current"></span>--}}
    {{--        <span class="lt-total"></span>--}}
    {{--    </div>--}}
    {{--    <div class="list-carousel-pagination">--}}
    {{--        <div class="lc-next"><i class="icon-right-open-big"></i></div>--}}
    {{--        <div class="lc-prev"><i class="icon-left-open-big"></i></div>--}}
    {{--    </div>--}}
    {{--    <!--/ Page Elements -->--}}

@endsection
