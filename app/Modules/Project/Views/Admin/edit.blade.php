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
    <!-- Add Section From -->
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
                            <div class="modal-body flex-grow-1">
                                @include($views.'componentsForm',[$component->templateFields,$wrappers_type])
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
    <!-- Add Section From ends -->


    <!-- Section Data From -->
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
    <!-- Section Data From ends-->

    <!-- project Sections -->
    <br>
    @foreach(@$row->sections as $section)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                        <span>
                                {{trans('projects.wrapper type')}} : {{@$section->wrapperType}}
                        </span>
                            <span>
                            {{trans('projects.order')}} : {{@$section->order}} {{trans('projects.SecID')}} : {{@$section->id}}
                        </span>
                        </div>

                        <div class="card-body">
                            @foreach($section->components as $component )
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <span>
                                                {{trans('projects.component name')}} : {{$component->name}}
                                            </span>
                                            <span>
                                                {{trans('projects.component template name')}} : {{$component->componentTemplate->name}}
                                            </span>
                                        </div>

                                        <div class="card-body">
                                            @foreach($component->componentTemplate->TemplateFields as $field )
                                                <div>
                                                    {{trans('projects.template field name')}} : {{$field->name}}
                                                </div>

                                                <div>
                                                    {{trans('projects.template field type')}} : {{$field->type}}
                                                </div>

                                                <div>
                                                    {{trans('projects.template field order')}} : {{$field->order}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- project Sections ends -->

@endsection
