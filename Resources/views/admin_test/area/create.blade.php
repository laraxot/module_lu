@section('page_heading','lista diritti')

@section('content')
    <x-flash-message />


{!! Form::bsOpen($row, 'store') !!}

<h1> Crea una nuova area</h1>
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
    {{ Form::bsSubmit('Crea area') }}
{{ Form::close() }}
@endsection
