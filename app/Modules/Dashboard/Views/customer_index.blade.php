@extends('BaseApp::layouts.master')
@section('page-title')
الصفحه الرئيسيه
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <p>اهلا 🎉 {{auth()->user()->name}} ! </p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    {{trans('user.available_balance')}}
                                    <a href="javascript:void(0);">
                                        {{auth()->user()->available_balance}}  {{trans('app.egyptian_pound')}}
                                    </a>
                                </h3>
                                <button class="btn btn-primary" type="button" style="color: #fff">
                                    <a href="/customer-money-request/create-request" style="color: #fff">{{trans('app.ask_transfer_money')}}</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">{{trans('user.your_numbers')}}</h4>
                                <div class="d-flex align-items-center">
{{--                                    <p class="card-text font-small-2 mr-25 mb-0">يتم تجديد الارقام تلقائيا</p>--}}
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$numbers->delivered_orders}}</h4>
                                                <p class="card-text font-small-3 mb-0">{{trans('orders.delivered_orders_count')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="box"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$numbers->pending_orders}}</h4>
                                                <p class="card-text font-small-3 mb-0">{{trans('orders.pending_orders_count')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$numbers->favourite_products}}</h4>
                                                <p class="card-text font-small-3 mb-0">{{trans('app.favourite products count')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-success mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$numbers->total_commission}}</h4>
                                                <p class="card-text font-small-3 mb-0">{{trans('app.total_user_commission')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->
                </div>
                @if(count($bannars))
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{trans('app.slider')}}</h4>
                            </div>
                            <div class="card-body">
                                <div id="carousel-example-caption" class="carousel slide carousel-fade" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php
                                        $i=0;
                                        ?>
                                        @forelse($bannars as $bannar)
                                            <li data-target="#carousel-example-caption" data-slide-to="{{$i}}" @if($i == 0) class="active" @endif></li>
                                                <?php
                                                $i++;
                                                ?>
                                            @empty
                                        @endforelse
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <?php
                                        $i=0;
                                        ?>
                                            @forelse($bannars as $bannar)
                                            <div class="carousel-item @if($i == 0) active @endif" style="height: 500px;width: 100%">
                                                <a href="{{$bannar->link}}">
                                                    <img class="img-fluid" style="width: 100%;height: 100%" src="{{$bannar->image}}" alt="First slide" />
                                                    <div class="carousel-caption">
{{--                                                        <h3 class="text-white">First Slide Label</h3>--}}
{{--                                                        <p class="text-white">{{$bannar->description}}--}}
                                                        </p>
                                                    </div>

                                                </a>
                                            </div>
                                                <?php
                                                $i++;
                                                ?>
                                        @empty
                                        @endforelse
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
@endsection
@push('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endpush
