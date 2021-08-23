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
                        <a href="{{$module_url}}/create" class="add-new btn btn-primary mt-50">{{trans('services.create')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('services.title')}}</th>
                                <th >{{trans('services.description')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($rows as $element)
                                    <tr>
                                        <td>{{@$element->id}}</td>
                                        <td>{{@$element->title}}</td>
                                        <td>
                                            @if(!empty($element->description))
                                                <p
                                                    class=""
                                                    data-toggle="popover"
                                                    data-content="{{$element->description}}"
                                                    data-trigger="hover"
                                                >
                                                    {{splitString($element->description , 0 , 100)}}..
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete'] , $element])
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
    <script src="/assets/Admin/js/pages/components-popovers.min.js"></script>

    <script src="/assets/Admin/js/pages/jquery.bootpag.min.js"></script>
    <script src="/assets/Admin/js/pages/jquery.twbsPagination.min.js"></script>

    <script src="/assets/Admin/js/pages/components-pagination.js "></script>

@endpush
