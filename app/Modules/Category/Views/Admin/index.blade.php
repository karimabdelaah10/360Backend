@extends('BaseApp::layouts.master')
@section('page-title')
    {{trans('app.Categories')}}
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
                            <a href="{{$module_url}}/create"
                               class="add-new btn btn-primary mt-50">{{trans('categories.create')}}</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-4">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('categories.name')}}</th>
                                    <th>{{trans('categories.description')}}</th>
                                    <th>Menu Order</th>
                                    <th>{{trans('categories.image')}}</th>
                                    <th>{{trans('app.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($rows as $element)
                                    <tr>
                                        <td>{{@$element->id}}</td>
                                        <td>{{@$element->name}}</td>
                                        <td>
                                            @if(!empty($element->description))
                                                <p
                                                    class=""
                                                    data-toggle="popover"
                                                    data-content="{{$element->description}}"
                                                    data-trigger="hover"
                                                >
                                                    {{splitString($element->description , 0 , 80)}}..
                                                </p>
                                        </td>
                                        <td>{{@$element->menu_order}}</td>
                                        <td><img style="width: 100px" src="{{image($element->image , 'small')}}"></td>
                                        @endif
                                        <td>
                                            <div class="dropdown dropright">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow " data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if(count($element->projects))
                                                        <a class="dropdown-item"  href="{{$module_url}}/list-projects/{{$element->id}}" >
                                                            <i data-feather="eye" class="mr-50"></i>
                                                            <span>List Projects</span>
                                                        </a>
                                                    @endif
                                                        @if(count($element->chlids))
                                                            <a class="dropdown-item"  href="{{$module_url}}/list-sub-categories/{{$element->id}}" >
                                                                <i data-feather="eye" class="mr-50"></i>
                                                                <span>List Sub Categories</span>
                                                            </a>
                                                        @endif
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
@push('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endpush
