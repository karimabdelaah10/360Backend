<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    @include('BaseApp::partials.meta')
    @include('BaseApp::partials.css')
    @stack('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Not authorized-->
            <div class="misc-wrapper">
                <div class="misc-inner p-2 p-sm-3">
                    <div class="w-100 text-center">
                        <h2 class="mb-1">@yield('message-title') </h2>
                        <p class="mb-2">
                            @yield('message-body')
                        </p>
                        <a class="btn btn-primary mb-1 btn-sm-block"
                           href="/">
                            {{trans('app.go home page')}}
                        </a>
                        @yield('image')
                    </div>
                </div>
            </div>
            <!-- / Not authorized-->
        </div>
    </div>
</div>
<!-- END: Content-->


<script>

</script>
</body>
<!-- END: Body-->

</html>
