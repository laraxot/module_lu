@extends('adm_theme::layouts.app')
@section('page_heading', 'Modifica Aree Utente')

@section('content')
    @include('theme::includes.flash')


    @include('lu::admin.user.edit.nav')
    {{-- dddx($params) --}}
    {{-- per update ci vuole id_area .. --}}
    {!! Form::bsOpen($user, 'index', 'store') !!}

    {{-- Form::bsMultiSelect('area_id',$user->areas,\XRA\LU\Models\Area::all()) --}}
    {{ Form::bsMultiCheckbox('areas') }}


    {{ Form::submit('Salva ed esci', ['class' => 'submit btn btn-success green-meadow']) }}

    {!! Form::close() !!}

@endsection
