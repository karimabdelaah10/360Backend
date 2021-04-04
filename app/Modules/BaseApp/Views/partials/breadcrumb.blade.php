
<div class="row breadcrumbs-top">
    <div class="col-12">
        <h2 class="content-header-title float-left mb-0">
            @yield('page-title')
        </h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{App::make("url")->to('/')}}">{{ trans('app.home') }}</a>
                </li>
                @if(@$breadcrumb)
                    @foreach ($breadcrumb as $key=>$value)
                        <li class="breadcrumb-item">
                            <a href="{{ $value }}">{{ $key }}</a>
                        </li>
                    @endforeach
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ @$page_title }}</li>
            </ol>
        </div>
    </div>
</div>
