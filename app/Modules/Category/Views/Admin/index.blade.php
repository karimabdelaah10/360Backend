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
                        <a href="{{$module_url}}/create" class="add-new btn btn-primary mt-50">{{trans('categories.create')}}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th >{{trans('categories.name')}}</th>
                                <th >{{trans('categories.description')}}</th>
                                <th >{{trans('categories.image')}}</th>
                                <th >{{trans('app.actions')}}</th>
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
                                    <td><img style="width: 100px" src="{{image($element->image , 'small')}}"> </td>
                                    @endif
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
</div>
@endsection
@push('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endpush
