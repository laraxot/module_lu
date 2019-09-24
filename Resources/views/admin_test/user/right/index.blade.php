@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Diritti Utente')

@section('content')
@include('formx::includes.flash')


@include('lu::admin.user.edit.nav')

{{-- per update ci vuole id_area .. --}}
{!! Form::bsOpen($user,'index','store') !!}

{{-- dd($user->allRights()) --}}
{{--
{{ Form::bsMultiSelect('right_id',$user->rights,$user->allRights()) }}
--}}
{{ Form::bsMultiCheckbox('rights') }}

{{Form::bsSubmit('Salva ed esci')}}

{!! Form::close() !!}

@endsection
