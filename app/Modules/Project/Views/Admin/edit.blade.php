@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('contentClasses')
    todo-application
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">{{trans('app.wrong action')}}</h4>
            {!! implode('' ,$errors->all('<div class="alert-body">:message</div>')) !!}
        </div>
    @endif
    <!-- Basic Tabs starts -->
    <div class="offset-xl-1 col-xl-10 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Section</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($componentsTemplate as $component)
                        <li class="nav-item">
                            <a class="nav-link"
                               id="{{$component->name}}-tab"
                               data-toggle="tab"
                               href="#{{$component->name}}"
                               aria-controls="{{$component->name}}"
                               role="tab"
                               aria-selected="true">
                                {{$component->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($componentsTemplate as $component)
                        <div class="tab-pane" id="{{$component->name}}"
                             aria-labelledby="{{$component->name}}-tab" role="tabpanel">
                            {!! Form::model($row,['method' => 'post','files' => true , 'url' => [url($module_url.'/createsection',$row->id)], 'class'=>"add-new-record modal-content pt-0" ] ) !!} {{ csrf_field() }}
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">{{$component->name}}</h5>
                            </div>
                            <input type="text" name="componentTemplateId" value="{{$component->id}}" hidden>
                            <input type="file" name="componentTessmplateId" value="{{$component->id}}" >
                            <div class="modal-body flex-grow-1">
                                @include($views.'componentsForm',$component->templateFields)
                                <button type="submit"
                                        class="btn btn-primary data-submit mr-1">{{trans('app.add')}}</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                        data-dismiss="modal">{{trans('app.cancel')}}</button>

                            </div>
                            {!! Form::close() !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tabs ends -->


    <div class="content-body">
        {!! Form::model($row,['method' => 'post','files' => true , 'class'=>"add-new-record modal-content pt-0" ] ) !!} {{ csrf_field() }}
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">{{trans('projects.edit job')}}</h5>
        </div>
        <div class="modal-body flex-grow-1">
            @include($views.'form',$row)
            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>

        </div>
        {!! Form::close() !!}
    </div>


@endsection
