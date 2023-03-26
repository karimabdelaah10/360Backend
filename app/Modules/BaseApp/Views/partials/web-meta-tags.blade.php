{{--general--}}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="{{$description ?? ''}}.">
<meta name="keywords" content="{{$keywords ?? ''}}">
<!-- Page Title -->
<title>{{appName()}} | @yield('page-title')</title>
<!--/ Page Title -->


{{--facebook--}}
<meta property="og:site_name" content="{{appName()}} | @yield('page-title')">
<meta property="og:title" content="{{appName()}} | @yield('page-title')" />
<meta property="og:description" content="{{$description ?? ''}}" />
<meta property="og:image" itemprop="image" content="{{$image ?? url('/assets/Web/images/logo_gold.png')}}">
<meta property="og:type" content="website" />

{{--twitter--}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{appName()}} | @yield('page-title')">
<meta name="twitter:description" content="{{$description ?? ''}}">
<meta name="twitter:image" content="{{$image ?? url('/assets/Web/images/logo_gold.png')}}">
