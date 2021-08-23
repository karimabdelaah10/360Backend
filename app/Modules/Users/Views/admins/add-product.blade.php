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
        {!! Form::model($row,['method' => 'post','files' => true , 'class'=>"add-new-record modal-content pt-0" ] ) !!}
        @csrf
        <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.add admin')}}</h5>
        </div>
        <div class="modal-body flex-grow-1">


            @include('BaseApp::form.select',
                [
                    'name'=>'product_id',
                    'options'=> $row->products,
                    'attributes'=>
                    [
                        'id'=>'admin_type',
                        'class'=>'form-control',
                        'label'=>trans('app.products'),
                        'placeholder'=>trans('app.products'),
                        'required'=>1
                    ]
                ])

            <input type="hidden" name="user_id" value="{{$row->admin->id}}">

            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>

        </div>
        {!! Form::close() !!}
    </div>
@endsection


<script>
    import Input from "../../../../../vendor/laravel/breeze/stubs/inertia/resources/js/Components/Input";
    export default {
        components: {Input}
    }
</script>
