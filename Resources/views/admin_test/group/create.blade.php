@extends('adm_theme::layouts.app')
@section('page_heading','lista diritti')

@section('content')
    @include('formx::includes.flash')
    

{!! Form::bsOpen($row, 'store') !!}

<h1> Crea un nuovo gruppo</h1>
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
