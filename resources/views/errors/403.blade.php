@extends('errors::customer-layout')

@section('page-title' ,trans('errors.Forbidden'))
@section('code', '403')
@section('message-title', trans('errors.Unauthorized action title'))
@section('message-body', trans('errors.Unauthorized action body'))
@section('image')
    <img class="img-fluid" src="/Admin/images/403.png" alt="Not authorized page"/>
@endsection
@push('css')
    <link rel="stylesheet" href="/css/pages/page-misc.min.css">
@endpush
