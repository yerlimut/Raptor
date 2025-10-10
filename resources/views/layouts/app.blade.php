@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')

@section('content_header')
    <h1>@yield('page-title', 'Admin Panel')</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            {{-- Aquí se inyecta el contenido dinámico de cada vista --}}
            @yield('Content')
        </div>
    </div>
</div>
@stop


{{-- ===================== ESTILOS PERSONALIZADOS ===================== --}}
@section('css')
    {{-- Admin Custom --}}
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">

    {{-- Bootstrap & complementos --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.4/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

    {{-- Iconos --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-pVb1y0fX3r9yKfHn0YxJ2sxq1clmZK6F2R7T3aKj6NH5M6GZwJt2ml8B6U2P2pK2b2x8qOaZ5x0yqM0P0HjM1Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Scroll personalizado --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

   

{{-- ===================== SCRIPTS ===================== --}}
@section('js')
    {{-- Librerías base --}}
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- jQuery + DataTables --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- AdminLTE --}}
    <script src="{{ asset('js/adminlte.js') }}"></script>

    @stack('scripts')
@stop


{{-- ===================== FOOTER ===================== --}}
@section('footer')
<footer class="main-footer">
    <div class="container">
        <div class="float-right d-none d-sm-block">
            <b>Versión</b> 1.0.0
        </div>
        <strong>
            Copyright &copy; {{ date('Y') }}
            <a href="#">RAPTOR: Administración de reparaciones, procesos, organización y repuestos del taller</a>.
        </strong> Todos los derechos reservados.
    </div>
</footer>

<style>
    html, body {
        height: 100%;
        margin: 0;
    }
    .wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .content-wrapper {
        flex: 1;
    }
</style>
@stop
