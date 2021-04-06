@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">{{trans('app.wrong action')}}</h4>
            {!! implode('' ,$errors->all('<div class="alert-body">:message</div>')) !!}
        </div>
    @endif
    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ @$page_description }}
                        </h4>
                        <a href="{{$module_url}}/clear" class="add-new btn btn-danger mt-50">{{trans('contactus.clear all')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >{{trans('contactus.name')}}</th>
                                <th >{{trans('contactus.email')}}</th>
                                <th >{{trans('contactus.mobile_number')}}</th>
                                <th >{{trans('contactus.message')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($rows as $element)
                                    <tr>
                                        <td>{{@$element->name}}</td>
                                        <td>
                                            @if(!empty($element->email))
                                                <a href="mailto:{{@$element->email}}">
                                                    {{@$element->email}}
                                                </a>
                                            @else
                                            @endif

                                        </td>
                                        <td>
                                            @if(!empty($element->mobile_number))
                                            <a href="tel:{{@$element->mobile_number}}">
                                                {{@$element->mobile_number}}
                                            </a>
                                            @else
                                            @endif
                                        </td>

                                        <td>
                                            @if(!empty($element->message))
                                                <p
                                                    class=""
                                                    data-toggle="popover"
                                                    data-content="{{$element->message}}"
                                                    data-trigger="hover"
                                                >
                                                    {{splitString($element->message , 0 , 100)}}..
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['view' ,'delete'] , $element])
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $rows->links('vendor.pagination.custom' ,['module_url'=>$module_url]) }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>
@endsection
@push('js')
    <script src="/js/pages/components-popovers.min.js"></script>

    <script src="/js/pages/jquery.bootpag.min.js"></script>
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>

    <script src="/js/pages/components-pagination.js"></script>

@endpush
