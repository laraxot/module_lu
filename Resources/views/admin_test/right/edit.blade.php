@extends('adm_theme::layouts.app')
@section('page_heading','lista diritti')

@section('content')
    <x-flash-message />


{!! Form::bsOpen($row, 'update') !!}

<h1> Modifica permesso: "{{ $row->right_define_name }}"</h1>
    <table class="table">
        <thead>
          <th>Nome permesso</th>
          <th>Implicito</th>
          <th>Livello</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ Form::bsText('right_define_name')}}</td>
                <td>{{ Form::bsText('has_implied')}}</td>
                <td>{{ Form::bsText('has_level')}}</td>
            </tr>
        </tbody>
    </table>
    {{ Form::bsSubmit('Salva modifiche') }}
{{ Form::close() }}
@endsection
