@extends('BaseApp::layouts.mail')
@section('content')
    <h5 class="card-title">  {{trans('email.Hello')}} {{$row->name}}  </h5>
    <p class="card-text"> {{trans('email.forget password token Is')}}
        <span class="badge badge-light code"> {{ $password }}</span>
    </p>
@endsection
