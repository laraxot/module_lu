@extends('adm_theme::layouts.app')
@section('page_heading','lista diritti')

@section('content')
    <x-flash-message />


{!! Form::bsOpen($row, 'update') !!}

<h1> Modifica area: "{{ $row->area_define_name }}"</h1>
    <table class="table">
        <thead>
          <th>Nome area</th>
        </thead>
        <tbody>
            <tr>
              <td>{{ Form::bsText('area_define_name')}}</td>
            </tr>
        </tbody>
    </table>
    {{ Form::bsSubmit('Salva modifiche') }}
{{ Form::close() }}
@endsection
