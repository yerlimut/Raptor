@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')

@section('content_header')
    <h1>@yield('page-title', 'Admin Panel')</h1>
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        {{-- Aquí se mostrará el contenido de las vistas hijas --}}
        @yield('content') {{-- 👈 usa otro nombre distinto --}}
    </div>
</div>
@endsection

{{-- ===================== ESTILOS PERSONALIZADOS ===================== --}}
@section('css')
{{-- DataTables (Bootstrap 5) --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

{{-- Iconos --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- Scroll personalizado --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

{{-- Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css"
    rel="stylesheet" />

{{-- Estilos personalizados --}}
<link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">

<style>
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

    .select2-container .select2-dropdown {
        z-index: 9999;
    }

    .card,
    .row {
        overflow: visible !important;
    }

    html,
    body {
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

{{-- Scroll personalizado --}}
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- AdminLTE --}}
<script src="{{ asset('js/adminlte.js') }}"></script>

<script>
    $(document).ready(function () {
        // === DataTables ===
        $('#myTable').DataTable({
            language: { url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" },
            dom: 'rtip'
        });

        // === Select2 ===
        $('select').each(function () {  
            const $this = $(this);
            if (
                !$this.closest('.swal2-container').length &&
                $this.is(':visible') &&
                !$this.hasClass('select2-hidden-accessible')
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

    function confirmarEliminacion(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection

{{-- ===================== FOOTER ===================== --}}
@section('footer')
<footer class="main-footer">
    <div class="container">
        <div class="float-right d-none d-sm-block">
            <b>Versión</b> 1.0.0
        </div>
        <strong>
            Copyright &copy; {{ date('Y') }}
            <a href="#">RAPTOR</a>. Administración de reparaciones, procesos, organización y repuestos del taller.
        </strong> Todos los derechos reservados.
    </div>
</footer>
@endsection
