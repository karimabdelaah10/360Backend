<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <!-- Page Title -->
    <title>{{appName()}} | Coming Soon</title>
    <!--/ Page Title -->
    <link href="https://fonts.googleapis.com/css?family=Archivo:400,600,700&display=swap" rel="stylesheet">

    <link href="/assets/Web/css/plugins.css" rel="stylesheet">
    <link href="/assets/Web/css/entypo.css" rel="stylesheet">

    <link href="/assets/Web/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="shortcut icon" href="/assets/Web/images/logo_gold.png" />
    <link rel="apple-touch-icon" href="/assets/Web/images/logo_gold.png" />
    <!--/ Favicons -->
</head>

<body>

<!-- Loading Text -->
<div class="loading-text">Loading</div>
<!-- Loading Text -->

<!-- Lines (Don't Touch) -->
<div class="lines"></div>
<!-- /Lines -->

<!-- Page Loader -->
<div class="cygni-loader">
    <div class="counter" data-count="99">00</div>
</div>
<!-- /Page Loader -->

<!-- Overlays (Don't Touch) -->
<div class="overlays"></div>
<!-- /Overlays -->

<!-- Header -->
<header class="site-header dark" id="header">
    <!-- Branding -->
    <a href="/" class="site-branding">
        <img class="light-logo logo-in" src="/assets/Web/images/logo_gold.png" alt="Site Light Logo">
    </a>
    <!-- /Branding -->
</header>
<!-- /Header -->
<div id="app">
    <!-- Site Content -->
    <div id="main" class="content">

        <!-- Page Settings -->
        <div class="page-settings" data-layout="{{@$site_layout ?? 'dark'}}"
             data-header-style="{{@$menu_layout ?? 'light'}}"
             data-menu-layout="{{@$menu_layout ?? 'light'}}"></div>
        <!--/ Page settings -->
            <!-- Section -->
            <div class="section" style="margin-top: 50px; margin-bottom: 0">
                <!--/ Wrapper -->
                <div class="wrapper-full">
                    <!-- Column -->
                    <div class="c-col-12 no-gap">
                        <!-- Image Wrapper -->
                        <div class="image-wrapper send-back" style="margin:auto;width: 700px">
                            <img  src="/2772788-middle.png" alt="Single Image">
                        </div>
                        <!--/ Image Wrapper -->

                    </div>
                    <!--/ Column -->

                </div>

            </div>
    </div>
</div>
<!--/ Site Content -->

<script src="/assets/Web/js/jquery.min.js"></script>
<script src="/assets/Web/js/jquery-ui.js"></script>
<script src="/assets/Web/js/plugins.js"></script>
<script src="/assets/Web/js/scripts.js"></script>
<script src="/assets/Web/js/jquery.smoothState.js"></script>
<script src="/assets/Web/js/page-transitions.js"></script>
</body>
</html>
