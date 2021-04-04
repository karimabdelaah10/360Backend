<nav aria-label="Page navigation example">
        <ul class="pagination mt-2 justify-content-start col-lg-1 col-md-12 float-left ml-2">
            <div class="btn-group">
                <button
                    class="btn btn-primary btn-sm dropdown-toggle waves-effect waves-float waves-light"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    {{request()->per_page ?? 15}}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url()->current()}}?page=1&per_page=10">10</a>
                    <a class="dropdown-item" href="{{url()->current()}}?page=1&per_page=15">15</a>
                    <a class="dropdown-item" href="{{url()->current()}}?page=1&per_page=20">20</a>
                    <a class="dropdown-item" href="{{url()->current()}}?page=1&per_page=50">50</a>
                    <a class="dropdown-item" href="{{url()->current()}}?page=1&per_page=100">100</a>
                </div>
            </div>
        </ul>
        <ul class="pagination mt-2 justify-content-end col-lg-9 col-md-12 float-right">
            @if ($paginator->onFirstPage())
                <li class="page-item first disabled"><a href="#" class="page-link"> << {{trans('pagination.first')}} </a></li>
                <li class="page-item prev disabled"><a class="page-link" href="#">{{trans('pagination.previous')}}</a></li>
            @else
                <li class="page-item first"><a href="{{$paginator->url(1)}}" class="page-link"> << {{trans('pagination.first')}} </a></li>
                <li class="page-item prev"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">{{trans('pagination.previous')}}</a></li>
            @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                    <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{request()->per_page ?  $url.'&per_page='. request()->per_page: $url}}">{{ $page }}</a></li>
                                @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item next"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">{{trans('pagination.next')}} </a></li>
                    <li class="page-item last"><a href="{{$paginator->url($paginator->lastPage())}}" class="page-link">{{trans('pagination.last')}} >></a></li>
                @else
                    <li class="page-item next disabled"><a class="page-link" href="#">{{trans('pagination.next')}} </a></li>
                    <li class="page-item last disabled"><a href="#" class="page-link">{{trans('pagination.last')}} >></a></li>
                @endif
        </ul>
    </nav>
