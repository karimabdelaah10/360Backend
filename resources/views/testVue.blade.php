@extends('BaseApp::layouts.web-contact')
@section('content')

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>

    <div class="py-12 bg-white h-100" id="app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    You're logged in!
                    <example-component></example-component>
                </div>
            </div>
        </div>
    </div>
@endsection

