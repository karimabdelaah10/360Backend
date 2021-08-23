@extends('BaseApp::layouts.web-category-projects')
@section('page-title')
    {{@$page_title}}
@endsection
@section('content')

    <!-- Titles (Don't Touch) -->
    <div class="list-titles"></div>
    <!-- Titles (Don't Touch) -->

    <!-- List Projects -->
    <div class="list-images">
        <div class="swiper-wrapper">

            @forelse($rows  as $element)
            <!-- Project -->
            <div class="list-image swiper-slide">

                <!-- Project URL -->
                <a href="/project/{{$element->id}}"></a>
                <!--/ Project URL -->

                <!-- Project Title -->
                <div class="list-p-title">{{@$element->name}}</div>
                <!--/ Project Title -->

                <!-- Project Metas -->
                <div class="list-titles-meta">
                    <span>{{@$element->description}}</span>
                </div>
                <!--/ Project Metas -->

                <!-- Project image -->
                <div class="list-image-wrapper">
                    <img src="{{image($element->image , 'large')}}" alt="List Project Image">
                </div>
                <!--/ Project Image -->

            </div>
            <!--/ Project -->
            @empty
            @endforelse
        </div>
    </div>
    <!--/ List Projects -->

    <!-- Page Elements -->
    <div class="list-titles-fraction">
        <span class="lt-current"></span>
        <span class="lt-total"></span>
    </div>
    <div class="list-carousel-pagination">
        <div class="lc-next"><i class="icon-right-open-big"></i></div>
        <div class="lc-prev"><i class="icon-left-open-big"></i></div>
    </div>
    <!--/ Page Elements -->

@endsection
