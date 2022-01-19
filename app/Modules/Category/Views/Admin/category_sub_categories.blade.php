@extends('BaseApp::layouts.master')
@section('page-title')
    {{$row->name}} Projects
@endsection
@section('content')
    <div class="section-wrapper">
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
                         </div>

                        <div class="table-responsive">
                            <table class="table mb-4">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category Page  Order</th>
                                    <th>{{trans('app.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($rows as $element)
                                    <tr>
                                        <td>{{@$element->id}}</td>
                                        <td>{{@$element->name}}</td>
                                        <td>{{@$element->category_order}}</td>
                                        <td>
                                            <div class="dropdown dropright">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow " data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{$module_url}}/edit-sub-category-order/{{$element->id}}">
                                                            <i data-feather="eye" class="mr-50"></i>
                                                            <span>Edit Sub Category Order</span>
                                                        </a>
                                                    <a class="dropdown-item" href="{{$module_url}}/edit/{{$element->id}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>{{trans('app.edit')}}</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{$module_url}}/delete/{{$element->id}}">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>{{trans('app.delete')}}</span>
                                                    </a>
                                                </div>
                                            </div>
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
    </div>
@endsection
