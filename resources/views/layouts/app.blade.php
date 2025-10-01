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
    
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-pVb1y0fX3r9yKfHn0YxJ2sxq1clmZK6F2R7T3aKj6NH5M6GZwJt2ml8B6U2P2pK2b2x8qOaZ5x0yqM0P0HjM1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    @stack('styles')
@stop



@section('js')
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
@stop
