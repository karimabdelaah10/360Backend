@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('contentClasses')
    todo-application
@endsection
@section('content')
    <div class="content-body">
        <!-- Basic Tables start -->
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ trans('projects.list project details') }}
                        </h4>

                        <a href="{{$module_url}}/complete/{{$row->id}}"
                           class="add-new btn btn-primary mt-50
{{--                            @if(count($row->sections)) disabled @endif --}}
                                   ">
                            {{trans('projects.complete')}}
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <tr>
                                <td>{{trans('Projects.name')}}</td>
                                <td>
                                    {{@$row->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('Projects.category')}}</td>
                                <td>
                                    {{@$row->Category->name}}
                                </td>
                            </tr>

                            <tr>
                                <td>{{trans('Projects.description')}}</td>
                                <td>
                                    {{@$row->description}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('Projects.color')}}</td>
                                <td>
                                    {{@$row->colorSchema}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('Projects.image')}}</td>
                                <td>
                                    {!! viewImage($row->image , 'large'  ,'uploads' , ['height'=>500 , 'width'=>500]) !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            @forelse($row->sections as $section)
                                <tr>
                                    <td>{{$section->id}}</td>
                                    {{--//@todo: section -> component title --}}
                                    <td>{{@$section->Components[0]->title}}</td> {{--will be chaned to title when title added--}}
                                    <td>{{$section->order}}</td>
                                    <td>{{$section->wrapperType}}</td>
                                    <td>@include('BaseApp::partials.actions' ,['actions'=>['edit' ,'delete'] , [$element=$section, $module_url=$section_module_url]])</td>
                                </tr>
                             @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sections table ends  -->
@endsection

