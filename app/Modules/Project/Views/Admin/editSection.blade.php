@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">{{trans('app.wrong action')}}</h4>
            {!! implode('' ,$errors->all('<div class="alert-body">:message</div>')) !!}
        </div>
    @endif

    <div class="content-body">
        @if($row->Components != null)
            @foreach($row->Components as $component)
                {!! Form::model($component,['method' => 'post','files' => true , 'class'=>"add-new-record modal-content pt-0" ] ) !!} {{ csrf_field() }}
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('projects.edit')}} section
                        id:{{$row->id}}</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <input type="text" name="sectionId" value="{{$component->Section->id}}" hidden>
                    @include($views.'editComponentsForm',[$component])
                    <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
                    <button type="reset" class="btn btn-outline-secondary"
                            data-dismiss="modal">{{trans('app.cancel')}}</button>

                </div>
                {!! Form::close() !!}
            @endforeach
        @endif
    </div>
@endsection
