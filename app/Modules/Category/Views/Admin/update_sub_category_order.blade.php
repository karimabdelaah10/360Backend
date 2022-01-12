@extends('BaseApp::layouts.master')
@section('page-title')
    Edit This Project Order In Category Page
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">{{trans('app.wrong action')}}</h4>
            {!! implode('' ,$errors->all('<div class="alert-body">:message</div>')) !!}
        </div>
    @endif
    <div class="content-body">
        {!! Form::model($row,['method' => 'post','files' => true , 'class'=>"add-new-record modal-content pt-0" ] ) !!} {{ csrf_field() }}
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Edit This Category Order In Category Page</h5>
        </div>
        <div class="modal-body flex-grow-1">

            @include('BaseApp::form.input',
                   ['name'=>'category_order',
                   'value'=> $row->category_order ,
                   'type'=>'number',
                   'attributes'=>['class'=>'form-control',
                   'max'=> $max_count ,
                   'min'=>1,
                   'id'=>'category_order',
                   'label'=>"Category Page Order",
                   'placeholder'=>"Category Page Order",
                   ]])

            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>

        </div>
        {!! Form::close() !!}
    </div>
@endsection
