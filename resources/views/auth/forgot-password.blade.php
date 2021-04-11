@extends('BaseApp::layouts.auth')
@push('css')
    <link rel="stylesheet" href="/assets/Admin/css/auth.css">
@endpush
@section('page-title')
    {{trans('auth.forget password')}}
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper" id="app">
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Forgot password-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">{{trans('auth.forget password ?')}} 🔒</h2>
                                <form class="auth-forgot-password-form mt-2" action="{{route('password.email')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="forgot-password-email">{{trans('user.mobile_number')}}</label>
                                        <input class="form-control"
                                               id="forgot-password-email"
                                               type="text"
                                               name="mobile_number"
                                               placeholder="010xxxxxxxx"
                                               aria-describedby="forgot-password-email"
                                               autofocus=""
                                               tabindex="1"/>
                                        @if($errors->has('mobile_number'))
                                            @foreach ($errors->get('mobile_number') as $message)
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                            @endforeach

                                        @endif
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="2">{{trans('auth.send new password')}}</button>
                                </form>
                                <p class="text-center mt-2"><a href="{{route('login')}}">
                                        {{trans('auth.go to login page')}}
                                        <i data-feather="chevron-right"></i>
                                    </a>
                                </p>
                                {{--                                <button type="button" class="btn btn-outline-success" id="type-success">Success</button>--}}

                            </div>
                        </div>
                        <!-- /Forgot password-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src="/assets/Admin/images/forgot-password-v2.png"
                                     alt="Forgot password"/>
                            </div>
                        </div>
                        <!-- /Left Text-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@push('js')
    <script>
    </script>
@endpush
