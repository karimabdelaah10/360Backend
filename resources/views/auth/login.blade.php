@extends('BaseApp::layouts.auth')
@push('css')
    <link rel="stylesheet" href="/assets/Admin/css/auth.css">
@endpush
@section('page-title')
    {{trans('auth.login')}}
@endsection
@section('content')
    <!-- BEGIN: Content-->
<div class="app-content content ">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper" id="app">
  <div class="content-header row"></div>
  <div class="content-body">
        <div class="auth-wrapper auth-v2">
           <div class="auth-inner row m-0">
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    <img class="img-fluid"
                         src="/assets/Admin/images/login.png"
                         alt="Login"/></div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title font-weight-bold mb-1">{{trans('auth.welcome in')}} {{ appName() }}! 👋</h2>
                    <p class="card-text mb-2">{{trans('auth.login to you account')}}</p>
                    <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
{{--                        @csrf--}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label" for="login-email">{{trans('user.mobile_number')}}</label>
                            <input class="form-control"
                                   id="login-email"
                                   type="text"
                                   name="mobile_number"
                                   value="{{old('mobile_number')}}"
                                   required
                                   placeholder="010xxxxxxxx"
                                   aria-describedby="mobile_number"
                                   autofocus=""
                                   tabindex="1"
                            />
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="login-password">{{trans('user.password')}}</label>
                                <a href="{{route('password.request')}}">
                                    <small>{{trans('auth.forget password ?')}}</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge"
                                       id="login-password"
                                       type="password"
                                       name="password"
                                       placeholder="············"
                                       aria-describedby="password"
                                       tabindex="2"
                                />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @if($errors->has('mobile_number') || $errors->has('password'))
                        <div class="form-group">
                                    <span style="color: red"> {{trans('auth.failed')}}</span>
                        </div>
                        @endif
                        @if($errors->has('user_inactive') || $errors->has('user_inactive'))
                            <div class="form-group">
                            @foreach ($errors->get('user_inactive') as $message)
                                <span class="text-danger">
                                        {{$message}}
                                </span>
                            @endforeach
                            </div>
                        @endif
                        <button class="btn btn-primary btn-block" tabindex="4">
                             {{trans('auth.login')}}
                        </button>
                    </form>

                </div>
            </div>
            <!-- /Login-->
            </div>
        </div>
      </div>
</div>
</div>
    <!-- END: Content-->
@endsection
