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
                                <th >#</th>
                                <th >{{trans('moneyrequest.available_balance')}}</th>
                                <th >{{trans('moneyrequest.requested_amount')}}</th>
                                <th >{{trans('app.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($rows as $element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td> {{$element->available_balance}}</td>
                                        <td> {{$element->requested_amount}}</td>
                                        <td> {!! getRequestStatus($element->status) !!} </td>
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
