<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Preorden #{{ $preorden->id }}</title>
    <style>
        /* Fuentes y márgenes */
        body { font-family: 'Arial', sans-serif; margin: 30px; }
        h1, h2 { text-align: center; margin-bottom: 10px; }
        h3 { margin-top: 30px; color: #2e6da4; }

        /* Estilos generales */
        .container { width: 100%; }
        .header { text-align: center; margin-bottom: 30px; }
        .logo { width: 120px; margin: 0 auto; }

        /* Tabla general */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f1f1f1; font-weight: bold; }

        /* Colores y estilos de la tabla */
        .subtotal { font-weight: bold; background-color: #f9f9f9; }
        .total { background-color: #d9edf7; font-weight: bold; }

        /* Información de contacto y pie de página */
        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #555; }
    </style>
</head>
<body>

   
        <h2>Preorden #{{ $preorden->id }}</h2>
   

    <!-- Información de la preorden -->
    <div class="info">
        <p><strong>Orden de trabajo:</strong> {{ $preorden->ordenTrabajo->id ?? 'N/A' }}</p>
        <p><strong>Mecánico:</strong> {{ $preorden->mecanico->nombre ?? 'N/A' }} {{ $preorden->mecanico->apellido ?? '' }}</p>
        <p><strong>Moto:</strong> {{ $preorden->ordenTrabajo->moto->placa ?? 'N/A' }}</p>
        <p><strong>Modelo:</strong> {{ $preorden->ordenTrabajo->moto->modelo ?? 'N/A' }}</p>
        <p><strong>Descripción:</strong> {{ $preorden->descripcion }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $preorden->created_at->format('d/m/Y') }}</p>
    </div>

    <!-- Repuestos asociados -->
    <h3>Repuestos Asociados</h3>
    <table>
        <thead>
            <tr>
                <th>Repuesto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @php $subtotal = 0; @endphp

            @forelse($preorden->repuestos as $rep)
                @php $subtotal += $rep->precio; @endphp
                <tr>
                    <td>{{ $rep->nombre }}</td>
                    <td>${{ number_format($rep->precio, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="text-align:center">No hay repuestos</td>
                </tr>
            @endforelse

            <tr class="subtotal">
                <td>Subtotal Repuestos</td>
                <td>${{ number_format($subtotal, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Costos -->
    <h3>Costos</h3>
    <table>
        <thead>
            <tr>
                <th>Mano de Obra</th>
                <th>Saldo</th>
                <th>Total General</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalGeneral = $preorden->mano_obra +  $subtotal;
            @endphp

            <tr>
                <td>${{ number_format($preorden->mano_obra, 0, ',', '.') }}</td>
                <td>${{ number_format($preorden->saldo, 0, ',', '.') }}</td>
                <td><strong>${{ number_format($totalGeneral, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Pie de página -->
    <div class="footer">
        <p>Este documento es generado electrónicamente y no requiere firma.</p>
        <p>© 2025 RAPTOR - Todos los derechos reservados</p>
    </div>

</body>
</html>
