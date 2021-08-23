<!-- BEGIN: Header-->
<nav id="header" class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0);">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style">
                        <i class="ficon" data-feather="moon"></i>
                    </a>
                </li>
                <search-component :user="{{ auth()->user() }}"></search-component>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
         <li class="nav-item dropdown dropdown-user">
                <a aria-expanded="false"
                   aria-haspopup="true"
                   class="nav-link dropdown-toggle dropdown-user-link"
                   data-toggle="dropdown" href="javascript:void(0);"
                   id="dropdown-user">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{auth()->user()->name}}</span>
                        <span class="user-status">{{trans('user.'.auth()->user()->type)}}</span>
                    </div>
                    <span class="avatar">
                    <img alt="avatar" class="round" height="40"
                         src="{{profile_picture()}}" width="40">
                    <span class="avatar-status-online"></span>
                </span>
                </a>
                <div aria-labelledby="dropdown-user" class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/profile/edit">
                            <i class="mr-50" data-feather="settings"></i> {{trans('navigation.account settings')}}
                        </a>
                        <a class="dropdown-item" href="{{route('logout')}}">
                        <i class="mr-50" data-feather="power"></i> {{trans('app.logout')}}
                        </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
