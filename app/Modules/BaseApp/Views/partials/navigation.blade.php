
<!-- BEGIN: Main Menu-->
<div  id="navigation" class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
     data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <span class="brand-logo"></span>
                    <h2 class="brand-text">{{ appName() }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" data-menu="menu-navigation" id="main-menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('dashboard')}}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="HomePage">{{trans('navigation.home')}}</span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/admin/contact-messages">
                    <i data-feather="message-circle"></i>
                    <span class="menu-title text-truncate" data-i18n="messages">{{trans('navigation.contacts messages')}}</span>
                </a>
            </li>

{{--            <li class=" nav-item">--}}
{{--                <a class="d-flex align-items-center" href="/projects">--}}
{{--                    <i data-feather="grid"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="Products">{{trans('navigation.projects')}}</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li>--}}
{{--                        <a class="d-flex align-items-center" href="/projects-categories">--}}
{{--                            <i data-feather="circle"></i>--}}
{{--                            <span class="menu-item text-truncate" data-i18n="product-categories">{{trans('navigation.projects categories')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="d-flex align-items-center" href="/projects">--}}
{{--                            <i data-feather="circle"></i>--}}
{{--                            <span class="menu-item text-truncate" data-i18n="product-categories">{{trans('navigation.projects')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class=" nav-item">--}}
{{--                <a class="d-flex align-items-center" href="/jobs">--}}
{{--                    <i data-feather="framer"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="admins">{{trans('navigation.jobs')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item">--}}
{{--                <a class="d-flex align-items-center" href="/admins">--}}
{{--                    <i data-feather="users"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="admins">{{trans('navigation.admins')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--
{{--            <li class=" nav-item">--}}
{{--                <a class="d-flex align-items-center" href="/configs/edit">--}}
{{--                    <i data-feather="settings"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="admins">{{trans('navigation.configs')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
