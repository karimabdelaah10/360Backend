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
<header class="site-header {{@$site_layout ?? 'dark'}}" id="header">

    <!-- Branding -->
    <a href="/" class="site-branding">
        <img class="dark-logo" src="/assets/Web/images/logo_gold.png" alt="Site Logo">
        <img class="light-logo" src="/assets/Web/images/logo_gold.png" alt="Site Light Logo">
    </a>
    <!-- /Branding -->

    <!-- Menu -->
    <div class="site-navigation {{@$menu_layout ?? 'light'}}">

        <!-- Menu Toggle (Don't Touch) -->
        <div class="menu-toggle"></div>
        <!-- /Menu Toggle -->

        <!-- Menu Overlays (Don't Touch) -->
        <div class="menu-overlays"></div>
        <!-- Menu Overlays -->

        <div class="menu-wrapper" id="navigation">

            <!-- Navigation -->
            <ul class="menu">

                <!-- Main Menu -->
                <li class="menu-item menu-item-active">
                    <a href="/">Home</a>
                </li>
                <li class="menu-item"><a href="/aboutus">About</a></li>
                <li class="menu-item has-children">
                    <a href="#" class="menu-item-lable">Projects</a>
                    <!-- Sub Menu -->
                    <ul class="sub-menu" style="z-index: 1000">
                        <li class="menu-item menu-item-active">
                            <a href="/category-projects/">All</a>
                        </li>
                        @forelse($categories as $category)
                            <li class="menu-item">
                                <a href="/sub-categories/{{$category->id}}">{{$category->name}}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                    <!--/ Sub Menu -->
                </li>

                <li class="menu-item"><a href="/jobs">Careers</a></li>
                <li class="menu-item"><a href="/contactus">Contact</a></li>
                <!-- /Main Menu -->

            </ul>
            <!-- /Navigation -->

        </div>

        <!-- Menu Widget (Left) -->
        <div class="menu-widget-wrapper mww-1">
            <div class="menu-widget">
                <div class="menu-widget-title">
                    WE ARE ALWAYS HERE;
                </div>

                <h5>{{@$about_us['address']}}
                    <a style="color: black" target="_blank" href="{{$about_us['google_map_location'] ?? '#'}}"><i
                            class="icon-location"></i></a>
                </h5>

                <h5>{{@$about_us['mobile_number']}}</h5>
{{--                <div style="color: black">--}}
{{--                    <a style="color: black" href="{{$about_us['facebook_url'] ?? '#'}}"><i--}}
{{--                            class="icon-facebook"></i> </a>--}}
{{--                    <a style="color: black" href="{{$about_us['instagram_url'] ?? '#'}}"><i class="icon-instagrem"></i>--}}
{{--                    </a>--}}
{{--                    <a style="color: black" href="{{$about_us['behance_url'] ?? '#'}}"><i class="icon-behance"></i></a>--}}
{{--                    <a style="color: black" href="{{$about_us['linkedin_url'] ?? '#'}}"><i--}}
{{--                            class="icon-linkedin"></i></a>--}}
{{--                    <a style="color: black" href="{{$about_us['pinterest_url'] ?? '#'}}"><i class="icon-pinterest"></i>--}}
{{--                    </a>--}}
{{--                    --}}{{--                    <h5>Developed By--}}
{{--                    --}}{{--                        <a href="https://wa.me/0201004976761" target="_blank"--}}
{{--                    --}}{{--                            style="text-decoration: underline;margin: 0 5px">--}}
{{--                    --}}{{--                            Abd Almonem  </a>&--}}
{{--                    --}}{{--                        <a href="https://wa.me/0201091811793" target="_blank"--}}
{{--                    --}}{{--                           style="text-decoration: underline;margin: 0 5px">--}}
{{--                    --}}{{--                            Karim Abdelaah  </a>--}}

{{--                    --}}{{--                    </h5>--}}
{{--                </div>--}}
            </div>
        </div>
        <!--/ Menu Widget (Left) -->

        <!-- Menu Widget (Middle) -->
        <div class="menu-widget-wrapper mww-2" style="bottom: -4%">
            <div class="scrolling-button">
                <a href="mailto:{{@$about_us['email']}}">{{@$about_us['email']}}</a>
            </div>
        </div>
        <!--/ Menu Widget (Middle) -->

        <!-- Menu Widget (Right -->
        <div class="menu-widget-wrapper mww-3">
            <div class="menu-widget">
                <ul class="widget-socials" style="font-size: .9em !important;">
                    <li>
                        <a href="{{$about_us['facebook_url'] ?? '#'}}" style="font-size: .9em !important;">
                            <i class="icon-facebook"></i>Facebook </a>
                    </li>
                    <li>
                        <a href="{{$about_us['instagram_url'] ?? '#'}}" style="font-size: .9em !important;">
                            <i class="icon-instagrem"></i> Instagram</a>
                    </li>
                    <li>
                        <a href="{{$about_us['behance_url'] ?? '#'}}" style="font-size: .9em !important;">
                            <i class="icon-behance"></i> Behance</a>
                    </li>
                    <li>
                        <a href="{{$about_us['linkedin_url'] ?? '#'}}" style="font-size: .9em !important;">
                            <i class="icon-linkedin"></i> LinkedIn</a>
                    </li>
                    <li>
                        <a href="{{$about_us['pinterest_url'] ?? '#'}}" style="font-size: .9em !important;">
                            <i class="icon-pinterest"></i>Pinterest </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/ Menu Widget (Right) -->

    </div>
    <!-- /Menu -->
</header>
<!-- /Header -->
