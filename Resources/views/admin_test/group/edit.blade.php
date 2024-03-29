@extends('adm_theme::layouts.app')
@section('page_heading','lista diritti')

@section('content')
    <x-flash-message />


{!! Form::bsOpen($row, 'update') !!}

<h1> Modifica gruppo: "{{ $row->group_define_name }}"</h1>
    <table class="table">
        <thead>
          <th>Nome gruppo</th>
        </thead>
        <tbody>
            <tr>
              <td>{{ Form::bsText('group_define_name')}}</td>
            </tr>
        </tbody>
    </table>
    {{ Form::bsSubmit('Crea area') }}
{{ Form::close() }}
@endsection
