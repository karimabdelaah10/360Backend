
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
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">{{trans('app.success message')}}</h4>
            <div class="alert-body">{{session('success')}}</div>
        </div>
    @endif
        <div class="content-body"><!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                            <!-- general -->
                            <li class="nav-item">
                                <a
                                    aria-expanded="true"
                                    class="nav-link active"
                                    data-toggle="pill"
                                    href="#account-vertical-general"
                                    id="account-pill-general"
                                >
                                    <i class="font-medium-3 mr-1" data-feather="user"></i>
                                    <span class="font-weight-bold">البيانات الخاصه بالحساب</span>
                                </a>
                            </li>
                            <!-- change password -->
                            <li class="nav-item">
                                <a
                                    aria-expanded="false"
                                    class="nav-link"
                                    data-toggle="pill"
                                    href="#account-vertical-password"
                                    id="account-pill-password"
                                >
                                    <i class="font-medium-3 mr-1" data-feather="lock"></i>
                                    <span class="font-weight-bold">تغير الرقم السرى</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div
                                        aria-expanded="true"
                                        aria-labelledby="account-pill-general"
                                        class="tab-pane active"
                                        id="account-vertical-general"
                                        role="tabpanel"
                                    >
                                        <!-- form -->
                                        <form class="validate-form mt-2"
                                              action="{{route('profile.edit')}}"
                                              method="POST"
                                              enctype="multipart/form-data"
                                        >
                                        @csrf
                                        <!-- header media -->
                                        <div class="media">
                                                <img
                                                    alt="profile image"
                                                    class="rounded mr-50"
                                                    height="80"
                                                    id="account-upload-img"
                                                    src="{{$row->profile_picture}}"
                                                    width="80"
                                                />
                                            <!-- upload and reset button -->
                                            <div class="media-body mt-75 ml-1">
                                                <label class="btn btn-sm btn-primary mb-75 mr-75" for="account-upload">
                                                    {{trans('profile.upload')}}</label>
                                                <input accept="image/*" hidden id="account-upload" type="file" name="profile_picture"/>
                                                <p>مسموح بتحميل صور بصيغه JPG او  JPEG او PNG</p>
                                                <p>اقصى حجم للصوره 2MB</p>
                                            </div>
                                            <!--/ upload and reset button -->
                                        </div>
                                        <!--/ header media -->

                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">{{trans('profile.name')}}</label>
                                                        <input
                                                            class="form-control"
                                                            id="account-name"
                                                            name="name"
                                                            placeholder="الأسم"
                                                            type="text"
                                                            required
                                                            value="{{$row->name}}"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">{{trans('profile.address')}}</label>
                                                        <input
                                                            class="form-control"
                                                            id="account-address"
                                                            name="address"
                                                            placeholder="العنوان"
                                                            type="text"
                                                            value="{{$row->address}}"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">{{trans('profile.email')}}</label>
                                                        <input
                                                            class="form-control"
                                                            id="account-email"
                                                            name="email"
                                                            placeholder="البريد الالكترونى"
                                                            required
                                                            type="email"
                                                            value="{{$row->email}}"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">{{trans('profile.mobile_number')}}</label>
                                                        <input
                                                            class="form-control"
                                                            id="account-mobile_number"
                                                            name="mobile_number"
                                                            required
                                                            placeholder="01*********"
                                                            type="text"
                                                            value="{{$row->mobile_number}}"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary mt-2 mr-1" type="submit"> {{trans('app.save')}}</button>
                                                    <button class="btn btn-outline-secondary mt-2" type="reset"> {{trans('app.cancel')}}</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ general tab -->

                                    <!-- change password -->
                                    <div
                                        aria-expanded="false"
                                        aria-labelledby="account-pill-password"
                                        class="tab-pane fade"
                                        id="account-vertical-password"
                                        role="tabpanel"
                                    >
                                        <!-- form -->
                                        <form class="validate-form" action="{{route('profile.changePassword')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-old-password">{{trans('profile.old_password')}}</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input
                                                                class="form-control"
                                                                id="account-old-password"
                                                                name="old_password"
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
                                                        @if($errors->has('old_password'))
                                                            <span class="text-danger">
                                                                {{trans('validation.old_password_mismatch')}}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-new-password">{{trans('profile.new_password')}}</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input
                                                                class="form-control"
                                                                id="account-new-password"
                                                                name="password"
                                                                placeholder="············"
                                                                required
                                                                type="password"
                                                            />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($errors->has('password'))
                                                            <span class="text-danger">
                                                                {{trans('validation.confirmed')}}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-retype-new-password">{{trans('profile.re_new_password')}}</label>
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
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary mr-1 mt-1" type="submit">
                                                        {{trans('app.save')}}
                                                    </button>
                                                    <button class="btn btn-outline-secondary mt-1" type="reset">
                                                        {{trans('app.cancel')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ change password -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->

        </div>
@endsection
