<li class="nav-item dropdown dropdown-language">
    <a class="nav-link dropdown-toggle"
       id="dropdown-flag"
       href="javascript:void(0);"
       data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        <i data-feather="chevrons-down"></i>
        <span class="selected-language">{{ucfirst(lang())}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right"
         aria-labelledby="dropdown-flag">
        @foreach(languages() as $key=>$lang)
        <a class="dropdown-item"
           href="{{urlLang(url()->full(),lang(),$key)}}">
            {{$lang}}
        </a>
        @endforeach
    </div>
</li>
