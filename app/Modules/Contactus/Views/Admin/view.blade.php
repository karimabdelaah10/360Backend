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
                            {{ @$page_description }}
                        </h4>
                        @if(!empty($row->email))
                            <a
                                class="add-new btn btn-primary mt-50"
                                href="mailto:{{@$row->email}}">
                                {{trans('contactus.replay')}}
                            </a>
                        @else
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-4">
                            <tr>
                                <td>{{trans('contactus.name')}}</td>
                                <td>
                                    {{@$row->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('contactus.email')}}</td>
                                <td>
                                    @if(!empty($row->email))
                                        <a href="mailto:{{@$row->email}}">
                                            {{@$row->email}}
                                        </a>
                                    @else
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('contactus.mobile_number')}}</td>
                                <td>
                                    @if(!empty($row->mobile_number))
                                        <a href="tel:{{@$row->mobile_number}}">
                                            {{@$row->mobile_number}}
                                        </a>
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{trans('contactus.message')}}</td>
                                <td>
                                    {{@$row->message}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
