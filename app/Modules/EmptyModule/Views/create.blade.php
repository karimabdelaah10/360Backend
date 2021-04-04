@extends('BaseApp::layouts.master')
@section('page-title')
<h6 class="slim-pagetitle">
    {{ @$page_title }}
</h6>
@endsection
@section('content')
<div class="section-wrapper">
    <div class="form-layout form-layout-4">
        {!! Form::model($row,['method' => 'post','files' => true] ) !!}
        {{ csrf_field() }}
        @include($views.'::form',$row)
        <!-- custom-file -->
        <div class="form-layout-footer mg-t-30">
            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>
        </div>
        {!! Form::close() !!}
        <!-- form-layout-footer -->
    </div>
    <!-- form-layout -->
</div>
@endsection
