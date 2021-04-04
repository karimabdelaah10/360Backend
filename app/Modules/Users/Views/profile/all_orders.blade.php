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
        <!-- Basic Tables start -->
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ @$page_description }}
                        </h4>

                    </div>

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
                            @forelse($rows as $element)
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
                        {{ $rows->links('vendor.pagination.custom' ,['module_url'=>$module_url]) }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Tables end -->
    </div>
@endsection
@push('js')
    <script src="/js/pages/jquery.twbsPagination.min.js"></script>
    <script src="/js/pages/components-pagination.js"></script>
@endpush
