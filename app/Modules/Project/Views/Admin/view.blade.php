@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
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
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <tr>
                                <td>{{trans('Projects.title')}}</td>
                                <td>
                                    {{@$row->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('Projects.category')}}</td>
                                <td>
                                    {{@$row->category}}
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            {{trans('projects.order')}} : {{@$section->order}}
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
@endsection

