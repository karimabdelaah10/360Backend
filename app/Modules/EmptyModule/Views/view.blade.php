@extends('BaseApp::layouts.master')
@section('page-title')
<h6 class="slim-pagetitle">
    {{ @$page_title }}
</h6>
@endsection
@section('content')
<div class="section-wrapper">
    @if(can('edit-'.$module) )
    <a href="{{$module}}/edit/{{$row->id}}" class="btn btn-success">
        <i class="fa fa-edit"></i> {{trans('slider.Edit')}}
    </a><br>
    @endif
    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered pull-left">
            @foreach(config("translatable.locales") as $lang)
                <tr>
                    <td width="25%" class="align-left">{{trans('slider.Title')}} {{$lang}}</td>
                    <td width="75%" class="align-left">{{@$row->translateOrDefault($lang)->title}}</td>
                </tr>
            @endforeach

            @foreach(config("translatable.locales") as $lang)
                <tr>
                    <td width="25%" class="align-left">{{trans('slider.Link')}} {{$lang}}</td>
                    <td width="75%" class="align-left">{{@$row->translateOrDefault($lang)->link}}</td>
                </tr>
            @endforeach


            @foreach(config("translatable.locales") as $lang)
                <tr>
                    <td width="25%" class="align-left">{{trans('slider.Description')}} {{$lang}}</td>
                    <td width="75%" class="align-left">{{@$row->translateOrDefault($lang)->description}}</td>
                </tr>
            @endforeach

            <tr>
                <td width="25%" class="align-left">{{trans('slider.Index')}}</td>
                <td width="75%" class="align-left">{{$row->index}}</td>
            </tr>
            <tr>
                <td width="25%" class="align-left">{{trans('slider.Is active')}}</td>
                <td width="75%" class="align-left"><img src="img/{{($row->is_active)?'check.png':'close.png'}}"></td>
            </tr>
            <tr>
                <td width="25%" class="align-left">{{trans('slider.Image')}}</td>
                <td width="75%" class="align-left"><img src="storage/uploads/small/{{($row->image)}}"></td>
            </tr>
        </table>
    </div>
</div>
@endsection
