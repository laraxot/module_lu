@extends('adm_theme::layouts.app')
@section('content')
    <h1>Welcome</h1>
    <h3>itemActions</h3>
    <ul>
        @foreach ($_panel->getActions('item') as $act)
            <li>{{ $act->url() }}</li>
        @endforeach
    </ul>

    <h3>containerActions</h3>

    <ul>
        @foreach ($_panel->getActions('container') as $act)
            <li>{!! $act->btnHtml() !!}</li>
        @endforeach
    </ul>
@endsection
