@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    <div class="content-body"><!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Medal Card -->
                <!-- Profile Card -->
                <div class="col-12">
                    <div class="card card-profile">
                        <img
                            src="/images/banner/banner-{{rand(1,12)}}.jpg"
                            class="img-fluid card-img-top"
                            alt="Profile Cover Photo"
                        />
                        <div class="card-body">
                            <div class="profile-image-wrapper">
                                <div class="profile-image">
                                    <div class="avatar">
                                        <img src="{{$row->profile_picture}}"
                                             alt="Profile Picture" />
                                    </div>
                                </div>
                            </div>
                            <h3>{{$row->name}}</h3>
                            <h6 class="text-muted">{{$row->type}}</h6>
                            <h6 class="text-capitalize">{{$row->email}}</h6>
                            <h6 class="text-capitalize">{{$row->address}}</h6>
                            <div class="badge badge-light-primary profile-badge">{{$row->mobile_number}}</div>
                            <br>
                            <div class="badge badge-primary ">
                                <a href="{{$module_url}}/edit/{{$row->id}}">
                                    {{trans('app.edit')}}
                                </a>
                            </div>
                            <hr class="mb-2" />
                           </div>
                    </div>
                </div>
                <!--/ Profile Card -->

                <!--/ Medal Card -->

                <!-- Statistics Card -->
                <!--/ Statistics Card -->
            </div>
            @if($row->getRawOriginal('admin_type') == \App\Modules\Users\Enums\AdminEnum::PRODUCT_ADMIN)
                <div class="row match-height">
                    <!-- Company Table Card -->
                    <div class="col-12">
                        <div class="card card-company-table">
                            <div class="card-header">
                                <h4 class="card-title">{{trans('admin.admin products')}}</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"
                                           href="/admins/add-product/{{$row->id}}">
                                            {{trans('products.add product')}}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th >#</th>
                                            <th >{{trans('products.title')}}</th>
                                            <th >{{trans('products.image')}}</th>
                                            <th >{{trans('app.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($row->products as $element)
                                            <tr>
                                                <td>{{$element->pivot->id}}</td>
                                                <td> {{$element->title}}</td>
                                                <td>
                                                    <div class="avatar-group">
                                                        <div data-toggle="tooltip"
                                                             data-popup="tooltip-custom"
                                                             data-placement="top"
                                                             title="" class="avatar pull-up my-0"
                                                             data-original-title="{{@$element->title}}">
                                                            <img src="{{image($element->image , 'small')}}"
                                                                 alt="Avatar"
                                                                 height="100" width="100">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown chart-dropdown">
                                                        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                               href="/admins/delete-product/{{@$element->pivot->id}}">
                                                                {{trans('app.delete')}}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Company Table Card -->
                </div>
            @endif
        </section>
        <!-- Dashboard Ecommerce ends -->
    </div>
@endsection
