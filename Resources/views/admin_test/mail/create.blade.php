@extends('adm_theme::layouts.app')
@section('page_heading','Test Email')

@section('content')
    <x-flash-message />


{!! Form::bsOpen($row, 'store') !!}

{{ Form::bsText('from')}}
{{ Form::bsText('to')}}
{{ Form::bsText('subject')}}
{{ Form::bsTextarea('body')}}

{{ Form::bsSubmit('test email') }}
{{ Form::close() }}
@endsection
