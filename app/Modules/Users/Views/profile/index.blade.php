@extends('BaseApp::layouts.master')
@section('page-title')
    {{ @$page_title }}
@endsection
@section('content')
    <div class="content-body"><!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
            <div class="row">
                <!-- User Card starts-->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="card user-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            <img
                                                class="img-fluid rounded"
                                                src="{{@$row->profile_picture}}"
                                                height="104"
                                                width="104"
                                                alt="User avatar"
                                            />
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h4 class="mb-0">{{@$row->name}}</h4>
                                                    <span class="card-text">{{@$row->email}}</span>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <a href="/profile/edit"
                                                       class="btn btn-primary">
                                                        {{trans('app.edit')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    </div>
                                <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                    <div class="user-info-wrapper">
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="user" class="mr-1"></i>
                                                <span class="card-text
                                                user-info-title font-weight-bold mb-0">
                                                    {{trans('user.address')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{@$row->address}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="check" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('app.status')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{@$row->is_active ? trans('app.active') : trans('app.inactive')}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="star" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('user.role')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{@$row->type}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="dollar-sign" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('user.available_balance')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{@$row->available_balance}} {{trans('app.egyptian_pound')}}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="phone" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">{{trans('user.mobile_number')}}</span>
                                            </div>
                                            <p class="card-text mb-0">{{@$row->mobile_number}}</p>
                                        </div>
                                        @if(is_user())
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title" style="width: 11.785rem;">
                                                <i data-feather="dollar-sign" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">
                                                    {{trans('paymentmethods.default method')}}</span>
                                            </div>
                                            @if($payment_method)
                                                <p class="card-text mb-0">{{trans('paymentmethods.'.$payment_method->type)}}</p>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card Ends-->

                <!-- Plan Card starts-->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="card plan-card">
                            <order-numbers-component :user="{{  auth()->user() }}"></order-numbers-component>
                    </div>
                </div>
                <!-- /Plan CardEnds -->
            </div>
            <div class="row match-height">
                <div class="col-lg-12 col-12">
                    <div class="card card-company-table">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('user.last 10 orders')}}</h4>
                            <div class="dropdown chart-dropdown">
                                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/profile/orders">{{trans('user.all orders')}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{trans('orders.serial')}}</th>
                                        <th>{{trans('orders.price')}}</th>
                                        <th>{{trans('orders.date')}}</th>
                                        <th>{{trans('orders.status')}}</th>
                                        <th>{{trans('app.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($row->orders->take(10) as $element)
                                        <tr>
                                            <td>{{@$element->id}}</td>
                                            <td>{{@$element->total_price}}</td>
                                            <td>{{@$element->created_at ? \Carbon\Carbon::parse($element->created_at)->format('Y-m-d') : '' }}</td>
                                            <td>
                                                {!! get_status_for_blade($element->status) !!}

                                            </td>
                                            <td>
                                                <div class="dropdown chart-dropdown">
                                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="/profile/order/{{@$element->id}}">{{trans('user.list one order')}}</a>
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

            </div>
            <div class="row match-height">
                <!-- Company Table Card -->
                <div class="col-lg-8 col-12">
                    <div class="card card-company-table">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('user.last 10 money requests')}}</h4>
                            <div class="dropdown chart-dropdown">
                                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/profile/money-requests">{{trans('user.all money requests')}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >{{trans('moneyrequest.available_balance')}}</th>
                                        <th >{{trans('moneyrequest.requested_amount')}}</th>
                                        <th >{{trans('app.status')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @if(!empty($row->moneyRequests))--}}
                                        @forelse($row->moneyRequests->take(10) as $element)
                                            <tr>
                                                <td>{{$element->id}}</td>
                                                <td> {{$element->available_balance}}</td>
                                                <td> {{$element->requested_amount}}</td>
                                                <td> {!! getRequestStatus($element->status) !!} </td>
                                            </tr>
                                        @empty
                                        @endforelse
{{--                                    @endif--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Company Table Card -->
                <!-- Transaction Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-transaction">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('user.transactions')}}</h4>
                        </div>
                        <div class="card-body">
                            @forelse($row->transactions->take(10) as $element)
                                @if($element->transaction_type == 'new order price')
                                    <div class="transaction-item">
                                        <div class="media">
                                            <div class="avatar bg-light-info rounded">
                                                <div class="avatar-content">
                                                    <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="transaction-title">{{trans('wallethistory.message_'.$element->transaction_type)}}</h6>
                                                <small>{{trans('wallethistory.type_'.$element->transaction_type)}}</small>
                                            </div>
                                        </div>
                                        <div class="font-weight-bolder text-success">+ {{$element->amount}}</div>
                                    </div>
                                @elseif($element->transaction_type == 'money request')
                                    <div class="transaction-item">
                                        <div class="media">
                                            <div class="avatar bg-light-primary rounded">
                                                <div class="avatar-content">
                                                    <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="transaction-title">{{trans('wallethistory.message_'.$element->transaction_type)}}</h6>
                                                <small>{{trans('wallethistory.type_'.$element->transaction_type)}}</small>
                                            </div>
                                        </div>
                                        <div class="font-weight-bolder text-danger">- {{$element->amount}}</div>
                                    </div>
                                @endif
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <!--/ Transaction Card -->
            </div>

        </section>
        <!-- Dashboard Ecommerce ends -->

    </div>
@endsection
