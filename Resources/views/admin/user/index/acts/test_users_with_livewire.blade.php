@extends('adm_theme::layouts.app')
@section('title', 'Test Users with livewire')
@section('content')

@livewire('theme::datagrid',compact('_panel'))

@endsection
