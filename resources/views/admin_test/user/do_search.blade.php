@extends('adm_theme::layouts.app')
@section('page_heading','cerca')
@section('content')
<x-flash-message />


<table class="table table-striped table-bordered">
@foreach($rows as $row)
<tr>
<td>{{ $row->handle }}</td>
<td>
{{ $row->cognome }} {{ $row->nome }}
</td>
<td>
{!! Form::bsBtnEdit(['id_user'=>$row->user_id],'search') !!}
</td>

</tr>
@endforeach
</table>
@endsection
