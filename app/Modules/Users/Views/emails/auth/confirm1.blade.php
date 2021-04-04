@extends('BaseApp::layouts.mail')
@section('content')
    <h5 class="card-title">  {{trans('email.Welcome On Tamweel')}}  👋</h5>
    <p class="card-text"> {{trans('email.Your Confirmation Code Is')}}
            <span class="badge badge-light code"></span>
        </p>
@endsection
