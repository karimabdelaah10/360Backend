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
            @include($views.'.form',$row)
            <div class="form-group">
                <label for="account_new_password">{{trans('admin.new_password')}}</label>
                <div class="input-group form-password-toggle input-group-merge">
                    <input
                        class="form-control"
                        id="account_new_password"
                        name="password"
                        placeholder="············"
                        type="password"
                        required
                    />
                    <div class="input-group-append">
                        <div class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </div>
                    </div>
                </div>
                @if($errors->has('password'))
                    <span class="text-danger">
                                    {{trans('validation.old_password_mismatch')}}
                                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="account-retype-new-password">{{trans('admin.re_new_password')}}</label>
                <div class="input-group form-password-toggle input-group-merge">
                    <input
                        class="form-control"
                        id="account-retype-new-password"
                        name="password_confirmation"
                        placeholder="············"
                        type="password"
                        required
                    />
                    <div class="input-group-append">
                        <div class="input-group-text cursor-pointer"><i
                                data-feather="eye"></i></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary data-submit mr-1">{{trans('app.save')}}</button>
            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">{{trans('app.cancel')}}</button>

        </div>
        {!! Form::close() !!}
    </div>
@endsection



