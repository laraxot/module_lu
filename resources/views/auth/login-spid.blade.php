@inject('SPIDAuth', 'SPIDAuth')
@extends('adm_theme::layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (session('url.intended'))
                        @lang('spid-auth::messages.spid_access_required')
                    @else
                        @lang('spid-auth::messages.spid_login')
                    @endif
                </div>
                <div class="card-body">
                    @include('lu::auth.spid-button', ['size' => 'm'])
                    @lang('spid-auth::messages.or') <a href="{{ url('/') }}">@lang('spid-auth::messages.return_home')</a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
@endsection
