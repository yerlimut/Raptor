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
{{-- DataTables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

{{-- Iconos --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- Scroll personalizado --}}
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

{{-- Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css"
    rel="stylesheet" />

{{-- Estilos personalizados --}}
<link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">

<style>
    /* === Ajustes globales de Select2 === */
    .select2-container {
        width: 100% !important;
    }

    .select2-container--bootstrap4 .select2-selection {
        min-height: 38px !important;
        border: 1px solid #ced4da !important;
        border-radius: 0.375rem !important;
    }

    .select2-container--bootstrap4 .select2-selection__rendered {
        line-height: 36px !important;
        padding-left: 8px !important;
    }

    /* Evita que el menú de opciones se corte */
    .select2-container .select2-dropdown {
        z-index: 9999;
    }

    /* Evita corte dentro de las cards */
    .card, .row {
        overflow: visible !important;
    }

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
@endsection

{{-- ===================== SCRIPTS ===================== --}}
@section('js')
{{-- jQuery primero --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

{{-- Scroll personalizado --}}
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- AdminLTE --}}
<script src="{{ asset('js/adminlte.js') }}"></script>

{{-- Activar DataTables y Select2 --}}
<script>
    $(document).ready(function() {
        // === DataTables ===
        $('#myTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            },
            dom: 'rtip'
        });

        // === Activar Select2 para TODOS los <select>, excepto dentro de SweetAlert ===
        $('select').each(function() {
            const $this = $(this);

            // Evita aplicar Select2 dentro de los contenedores de SweetAlert
            if (
                !$this.closest('.swal2-container').length && // no dentro de SweetAlert
                $this.is(':visible') &&                      // solo visibles
                !$this.hasClass('select2-hidden-accessible') // no inicializados
            ) {
                $this.select2({
                    theme: 'bootstrap4',
                    placeholder: $this.attr('placeholder') || '-- Seleccione --',
                    allowClear: true,
                    width: '100%'
                });
            }
        });
    });
</script>

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
@stop
