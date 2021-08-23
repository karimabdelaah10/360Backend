@extends('BaseApp::layouts.auth')
@push('css')
    <link rel="stylesheet" href="css/auth.css">
@endpush
@section('page-title')
    تسجيل حساب جديد
@endsection
@section('page-title')
    <h6 class="slim-pagetitle">
        تسجيل حساب جديد
    </h6>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper" id="app">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <!-- Brand logo-->
                        <a class="brand-logo" href="{{url('/')}}">
                            <h2 class="brand-text text-primary ml-1">{{ appName() }}</h2></a>
                        <!-- /Brand logo-->
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/pages/register-v2.svg" alt="Register V2"/></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">تبدا الرحله من هنا 🚀</h2>
                                <p class="card-text mb-2">استمتع بالعمل معنا!</p>
                                <form class="auth-register-form mt-2" action="{{route('register')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="register-username">اسم المستخدم</label>
                                        <input class="form-control" id="register-username"
                                               type="text"
                                               name="name"
                                               value="{{old('name')}}"
                                               placeholder="xxxxx"
                                               aria-describedby="register-username"
                                               autofocus=""
                                               tabindex="1"
                                               required
                                        />
                                        @if($errors->has('name'))
                                            <span class="text-danger">
                                                {{$errors->first('name')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-email">البريد الالكرتونى</label>
                                        <input class="form-control" id="register-email"
                                               type="email"
                                               name="email"
                                               value="{{old('email')}}"
                                               placeholder="xxx@xxx.com"
                                               aria-describedby="register-email"
                                               tabindex="2"
                                               required
                                        />
                                        @if($errors->has('email'))
                                            <span class="text-danger">
                                                {{$errors->first('email')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-email"> رقم الهاتف</label>
                                        <input class="form-control"
                                               id="mobile_number"
                                               type="text"
                                               name="mobile_number"
                                               value="{{old('mobile_number')}}"
                                               placeholder="010xxxxxxxx"
                                               aria-describedby="mobile_number"
                                               tabindex="3"
                                               required
                                        />
                                        @if($errors->has('mobile_number'))
                                            <span class="text-danger">
                                                {{$errors->first('mobile_number')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-password">الرقم السرى</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge"
                                                   id="register-password"
                                                   type="password"
                                                   name="password"
                                                   placeholder="············"
                                                   aria-describedby="register-password"
                                                   tabindex="4"
                                                   required
                                            />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="register-password">نكرار الرقم السرى </label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge"
                                                   id="register-password"
                                                   type="password"
                                                   name="password_confirmation"
                                                   placeholder="············"
                                                   aria-describedby="register-password"
                                                   tabindex="5"
                                                   required
                                            />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="text-danger">
                                                {{$errors->first('password')}}
                                            </span>
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
                                    <button class="btn btn-primary btn-block" tabindex="5">تسجيل البيانات</button>
                                </form>
                                <p class="text-center mt-2">
                                    <span>هل لديك حساب ؟</span>
                                    <a href="{{route('login')}}">
                                        <span>&nbsp;قم بتسجيل الدخول بدلاً من ذلك</span>
                                    </a>
                                </p>

                             </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
