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
        <div class="j-back">{{$parent->name}}</div>
        <!--/ Background Text -->

        <!-- Blog Posts -->
        <div class="pe-blog-posts">

            <!-- Post Sizer and Gutter (Don't Touch) -->
            <div class="pe-blog-sizer"></div>
            <div class="pe-blog-gutter"></div>
            <!-- Post Sizer and Gutter (Don't Touch) -->

            <!-- Blog Page Title -->
            <div class="pe-blog-stamp">
                <div class="blog-page-title has-animation skew-up">{{$parent->name}}</div>
            </div>
            <!-- Blog Page Title -->
            <!-- Post (Sticky) -->
            @forelse($rows as $row)
                <div class="pe-post
                @if($loop->first)
                sticky
@endif"
                >
                    <!-- Post URL --><a href="/category-projects/{{$row->id}}">

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
@endsection
