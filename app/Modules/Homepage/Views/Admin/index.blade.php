@extends('BaseApp::layouts.master')
@section('page-title')
{{trans('app.Home Page')}}
@endsection
@section('content')
<div class="section-wrapper">
        <example-component></example-component>
    <title_l_pragraph_r></title_l_pragraph_r>

</div>
@endsection
@push('js')
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endpush
