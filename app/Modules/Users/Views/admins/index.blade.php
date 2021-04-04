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
                        <a href="{{$module_url}}/create" class="add-new btn btn-primary mt-50">{{trans('admin.add admin')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('admin.name')}}</th>
                                <th >{{trans('admin.admin_type')}}</th>
                                <th >{{trans('admin.address')}}</th>
                                <th >{{trans('admin.email')}}</th>
                                <th >{{trans('admin.mobile_number')}}</th>
                                <th >{{trans('admin.profile_picture')}}</th>
                                <th >{{trans('app.status')}}</th>
                                <th >{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($rows))
                                @foreach($rows as $element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->name}}</td>
                                        <td>{{trans('admin.'.$element->admin_type)}}</td>
                                        <td>{{$element->address}}</td>
                                        <td>{{$element->email}}</td>
                                        <td>{{$element->mobile_number}}</td>
                                        <td>
                                            <div class="avatar-group">
                                                <div data-toggle="tooltip"
                                                     data-popup="tooltip-custom"
                                                     data-placement="top"
                                                     title="" class="avatar pull-up my-0"
                                                     data-original-title="{{$element->name}}">
                                                    <img src="{{$element->profile_picture}}"
                                                         alt="Avatar"
                                                         height="35" width="35">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill {{$element->is_active ? 'badge-light-success':'badge-light-danger'}} mr-1"> {{$element->is_active ? trans('app.active'):trans('app.inactive')}} </span>
                                        </td>
                                        <td>
                                            @include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete' ,'view'] , $element])
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>
    <script src="/js/pages/components-pagination.js"></script>
@endpush
