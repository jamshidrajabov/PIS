@php
    $layout = Auth::user()->role_id == 1 ? 'admin.app' : 'user.app';
@endphp
@extends($layout)
@section('title','Dorilar')
@section('page','Dorilar')
@section('content')
@include('drugspage')
@endsection