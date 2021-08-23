@extends('errors::customer-layout')

@section('page-title' ,trans('errors.Error action title'))
@section('code', '403')
@section('message-title', trans('errors.Error action title'))
@section('message-body', trans('errors.Error action body'))
@section('image')
    <img class="img-fluid" src="/Admin/images/404.png" alt="Not authorized page"/>
@endsection
@push('css')
    <link rel="stylesheet" href="/css/pages/page-misc.min.css">
@endpush
