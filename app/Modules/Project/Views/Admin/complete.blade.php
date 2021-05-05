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
    <div class="content-body">
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
                                {{$component->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($componentsTemplate as $component)
                        <div class="tab-pane" id="{{$component->name}}"
                             aria-labelledby="{{$component->name}}-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-8">
                                    {!! Form::model($row,['method' => 'post','files' => true , 'url' => [url($module_url.'/createsection',$row->id)], 'class'=>"add-new-record modal-content pt-0" ] ) !!} {{ csrf_field() }}
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$component->title}}</h5>
                                    </div>
                                    <input type="text" name="componentTemplateId" value="{{$component->id}}" hidden>
                                    <div class="modal-body flex-grow-1">
                                        @include($views.'componentsForm',[$component->templateFields,$wrappers_type,$all_projects])
                                        <button type="submit"
                                                class="btn btn-primary data-submit mr-1">{{trans('app.add')}}</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                                data-dismiss="modal">{{trans('app.cancel')}}</button>

                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="col-4">
                                    <img style="width: 100%" src="/storage/component_temp_images/{{$component->image}}"
                                         alt="{{$component->image}}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Add Section From ends -->

    <!-- Sections table  -->
    <div class="content-body">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Project Sections</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('projects.section title')}}</th>
                                <th>{{trans('projects.section order')}}</th>
                                <th>{{trans('projects.section wrapperType')}}</th>
                                <th>{{trans('app.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($row->sections))
                                @foreach($row->sections as $section)
                                    <tr>
                                        <td>{{$section->id}}</td>
                                        <td>{{$section->Components[0]->title}}</td> {{--will be chaned to title when title added--}}
                                        <td>{{$section->order}}</td>
                                        <td>{{$section->wrapperType}}</td>
                                        <td>@include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete'] , [$element=$section, $module_url=$section_module_url]])</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sections table ends  -->

@endsection
