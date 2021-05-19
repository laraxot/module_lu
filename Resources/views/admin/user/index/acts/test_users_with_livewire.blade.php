@extends('adm_theme::layouts.app')
@section('title', 'Test Users with livewire')
@section('content')

@livewire('formx::datagrid',compact('_panel'))

@endsection
