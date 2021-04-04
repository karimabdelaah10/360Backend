<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    @include('BaseApp::partials.meta')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/jquery.bootstrap-touchspin.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/components.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/semi-dark-layout.min.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/ext-component-sliders.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/palette-noui.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/app-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/ext-component-toastr.min.css">
    <!-- END: Page CSS-->
        @stack('css')

    <!-- BEGIN: Custom CSS-->
        @if(lang() == 'ar')
    <link rel="stylesheet" type="text/css" href="/css/products/ar/custom-rtl.min.css">
        @endif
    <link rel="stylesheet" type="text/css" href="/css/products/{{lang()}}/style.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern content-detached-left-sidebar navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">

@include('BaseApp::partials.header')
@include('BaseApp::partials.navigation')

<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application mb-10">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper"  id="app">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                @include('BaseApp::partials.flash_messages')
                @include('BaseApp::partials.breadcrumb')
            </div>
        </div>
        @yield('content')
    </div>
</div>

<!-- END: Content-->
@include('BaseApp::partials.footer')
<!-- BEGIN: Vendor JS-->
<script src="/js/products/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="/js/products/wNumb.min.js"></script>
<script src="/js/products/nouislider.min.js"></script>
<script src="/js/products/toastr.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="/js/products/app-menu.min.js"></script>
<script src="/js/products/app.min.js"></script>
<script src="/js/products/customizer.min.js"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<script src="/js/products/form-number-input.min.js"></script>
<script src="/js/products/app-ecommerce.min.js"></script>
<!-- END: Page JS-->
<script src="/js/vendors.js"></script>

<script>
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 1, height: 1 });
        }
    })
</script>
@stack('js')
</body>
</html>
