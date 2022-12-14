@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Utente')

@section('content')
@include('theme::includes.flash')


@include('lu::admin.user.edit.nav')

{!! Form::bsOpen($row,'update') !!}

{{ Form::bsText('cognome') }}
{{ Form::bsText('nome') }}
{{ Form::bsText('email') }}
{{ Form::bsText('ente') }}
{{ Form::bsText('matr') }}
{{ Form::bsText('handle') }}
{{ Form::bsText('passwd') }}

{{-- Form::bsSelect('giust',null,$row->giust_opts()) --}}

{{Form::bsSubmit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Form::close() !!}

@endsection
