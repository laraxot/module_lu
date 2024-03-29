@if(\Auth::check())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" title="Welcome {{\Auth::user()->handle}}" href="#" data-effect="mfp-move-from-top" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>@lang('lu::headernav.welcome') {{\Auth::user()->handle}}!
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{ url(app()->getLocale().'/profile/'.\Auth::user()->handle) }}" class="dropdown-item" title="profile">Profile</a></li>
            <li><a href="{{ url('/logout') }}" class="dropdown-item" title="logout"
                onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                Logout
            </a></li>
            <form id="logout-form" action="{{ route('logout',['lang'=>$lang]) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </li>
@else
    <li class="nav-item">
        <a href="{{ route('login',['lang'=>$lang]) }}" class="ajax-popup-link nav-link" id="js-login" title="login">
            <i class="fa fa-sign-in"></i>&nbsp;Sign in
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('register',['lang'=>$lang]) }}" class="ajax-popup-link nav-link" title="register" >
            <i class="fa fa-edit"></i>&nbsp;Sign up
        </a>
    </li>
@endif

{{--
<div id="login-ajax" class="mfp-with-anim mfp-hide mfp-dialog clearfix"><i class="fa fa-refresh fa-spin"></i></div>
<div id="register-ajax" class="mfp-with-anim mfp-hide mfp-dialog clearfix"><i class="fa fa-refresh fa-spin"></i></div>
@include('lu::auth.login_register_recover')
--}}

{{--
{{ Theme::add('theme/bc/magnific-popup/dist/jquery.magnific-popup.min.js') }}
{{ Theme::add('theme/bc/magnific-popup/dist/magnific-popup.css') }}

{{ Theme::add('lu::css/lighbox.css') }}
{{ Theme::add('lu::js/lighbox.js') }}
--}}
{{ Theme::add('lu::dist/css/app.css') }}
{{ Theme::add('lu::dist/js/app.js') }}
