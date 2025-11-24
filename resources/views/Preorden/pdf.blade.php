<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Preorden #{{ $preorden->id }}</title>

    <style>
        /* Estilo general */
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            margin: 40px;
            color: #2c3e50;
        }

        h1, h2, h3 {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 5px;
            color: #1a5276;
        }

        h3 {
            font-size: 20px;
            margin-top: 35px;
            margin-bottom: 10px;
            color: #154360;
            border-bottom: 2px solid #154360;
            padding-bottom: 5px;
        }

        /* Encabezado */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #1a5276;
        }

        .header img {
            width: 130px;
            margin-bottom: 10px;
        }

        /* Información general */
        .info p {
            font-size: 14px;
            margin: 5px 0;
        }

        /* Tablas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }

        th {
            background: #1a5276;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        td {
            border-bottom: 1px solid #d5d8dc;
            padding: 8px;
        }

        .subtotal {
            background: #f4f6f7;
            font-weight: bold;
        }

        .total-row {
            background: #eaf2f8;
            font-weight: bold;
        }

        /* Pie de página */
        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 40px;
            color: #616a6b;
            border-top: 1px solid #d5d8dc;
            padding-top: 10px;
        }
    </style>
</head>

<body>

    <!-- Encabezado -->
    <div class="header">
        {{-- Si tienes un logo --}}
        {{-- <img src="{{ public_path('img/logo.png') }}" alt="Logo"> --}}
        <h2>Preorden #{{ $preorden->id }}</h2>
    </div>

    <div class="info">
       <p><strong>Cliente:</strong>
        {{ $preorden->ordenTrabajo->moto->cliente->nombre ?? 'N/A' }}
        {{ $preorden->ordenTrabajo->moto->cliente->apellido ?? '' }}
    </p>


    <!-- Información principal -->
  
        <p><strong>Orden de trabajo:</strong> {{ $preorden->ordenTrabajo->id ?? 'N/A' }}</p>
        <p><strong>Mecánico:</strong> {{ $preorden->mecanico->nombre ?? 'N/A' }} {{ $preorden->mecanico->apellido ?? '' }}</p>
        <p><strong>Moto:</strong> {{ $preorden->ordenTrabajo->moto->placa ?? 'N/A' }}</p>
        <p><strong>Modelo:</strong> {{ $preorden->ordenTrabajo->moto->modelo ?? 'N/A' }}</p>
        <p><strong>Descripción:</strong> {{ $preorden->descripcion }}</p>
        <p><strong>Fecha de creación:</strong> {{ $preorden->created_at->format('d/m/Y') }}</p>
    </div>

    <!-- Repuestos -->
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
                    <td colspan="2" style="text-align:center; font-style:italic;">No hay repuestos</td>
                </tr>
            @endforelse

            <tr class="subtotal">
                <td>Subtotal Repuestos</td>
                <td>${{ number_format($subtotal, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Costos -->
    <h3>Costos Generales</h3>
    <table>
        <thead>
            <tr>
                <th>Mano de Obra</th>
                <th>Saldo</th>
                <th>Total General</th>
            </tr>
        </thead>

        <tbody>
            @php $totalGeneral = $preorden->mano_obra + $subtotal; @endphp

            <tr class="total-row">
                <td>${{ number_format($preorden->mano_obra, 0, ',', '.') }}</td>
                <td>${{ number_format($preorden->saldo, 0, ',', '.') }}</td>
                <td><strong>${{ number_format($totalGeneral, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Pie -->
    <div class="footer">
        <p>Documento generado electrónicamente. No requiere firma.</p>
        <p>© 2025 RAPTOR - Todos los derechos reservados</p>
    </div>

</body>
</html>
