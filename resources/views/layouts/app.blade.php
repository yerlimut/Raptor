@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')

@section('content_header')
    <h1>@yield('page-title', 'Admin Panel')</h1>
@stop

@section('content')
    {{-- Dynamic content --}}
    @yield('content')
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
    @stack('styles')
@stop

@section('js')
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
@stop
