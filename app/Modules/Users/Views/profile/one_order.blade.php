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
        <section class="invoice-preview-wrapper">
            <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-header">
                            <h4 class="card-title">
                                {{ @$page_description }}
                            </h4>
                        </div>
                        <hr class="invoice-spacing" />

                        <!-- Address and Contact starts -->
                        <div class="card-body invoice-padding pt-0">
                            <div class="row invoice-spacing">
                                <div class="col-xl-6 p-0">
                                    <h6 class="mb-2">{{trans('orders.customer_details')}} :</h6>
                                    <h4 class="mb-25">{{@$row->customer_name}}</h4>
                                    <p class="card-text mb-25">{{@$row->customer_mobile_number}}</p>
                                    <p class="card-text mb-25">{{@$row->customer_area}}</p>
                                    <p class="card-text mb-25">{{@$row->customer_address}}</p>
                                    <p class="card-text mb-0">{{@$row->governorate->title}}</p>
                                </div>
                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                    <h6 class="mb-2">{{trans('orders.price_details')}} :</h6>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="pr-1">{{trans('orders.shipping_price')}}:</td>
                                            <td><span class="font-weight-bold">{{@$row->governorate->shipping_coast ?? 0 }}   {{trans('app.egyptian_pound')}}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="pr-1">{{trans('orders.total_price')}}:</td>
                                            <td><span class="font-weight-bold">{{$row->total_price}}   {{trans('app.egyptian_pound')}}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-md-0 mt-2">
                                    <h4 class="invoice-title">
                                        {{trans('orders.serial')}}
                                        <span class="invoice-number">#{{$row->id}}</span>
                                    </h4>
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title">{{trans('orders.date')}} : {{$row->created_at ? \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') : ''}}</p>
                                        <p class="invoice-date"> {{trans('orders.status')}} : {!! get_status_for_blade($row->status) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Address and Contact ends -->
                        <!-- Invoice Description starts -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="py-1">{{trans('orders.product')}}</th>
                                    <th class="py-1">{{trans('orders.details')}}</th>
                                    <th class="py-1">{{trans('orders.amount')}}</th>
                                    {{--                                    <th class="py-1">{{trans('orders.product_price')}}</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($row->orderProducts as $oneOrderProduct)
                                    <tr class="border-bottom">
                                        <td class="py-1">
                                            <p class="card-text font-weight-bold mb-25">{{@$oneOrderProduct->title}}</p>
                                        </td>
                                        <td class="py-1">
                                            <p class="card-text text-nowrap">{{$oneOrderProduct->pivot->detail}}</p>

                                        </td>
                                        <td class="py-1">
                                            <span class="font-weight-bold">{{@$oneOrderProduct->pivot->amount}}</span>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>                        <!-- Invoice Description ends -->
                        <hr class="invoice-spacing" />
                        <!-- Invoice Note starts -->
                        <div class="card-body invoice-padding pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <span class="font-weight-bold">{{trans('orders.shipping_notes')}} :</span>
                                    <span>
                                        {{@$row->shipping_note}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Note ends -->
                    </div>
                </div>
                <!-- /Invoice -->

            </div>
        </section>
    </div>
@endsection
