<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Preorden #{{ $preorden->id }}</title>
    <style>
        body { font-family: DejaVu Sans; margin: 30px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        .info { margin-bottom: 20px; }
        .total { font-weight: bold; background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>RAPTOR</h1>
    <h2>Preorden #{{ $preorden->id }}</h2>

    <div class="info">
        <p><strong>Orden de trabajo:</strong> {{ $preorden->ordenTrabajo->id ?? 'N/A' }}</p>
        <p><strong>Mecánico:</strong> {{ $preorden->mecanico->nombre ?? 'N/A' }} {{ $preorden->mecanico->apellido ?? '' }}</p>
        <p><strong>Moto:</strong> {{ $preorden->moto->placa ?? 'N/A' }}</p>
        <p><strong>Descripción:</strong> {{ $preorden->descripcion }}</p>
        <p><strong>Saldo total:</strong> ${{ number_format($preorden->saldo, 0, ',', '.') }}</p>
        <p><strong>Fecha de creación:</strong> {{ $preorden->created_at->format('d/m/Y') }}</p>
    </div>

    <h3>Repuestos Asociados</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre del repuesto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @php
                $subtotal = 0;
            @endphp

            @foreach ($preorden->repuestos as $repuesto)
                @php
                    $subtotal += $repuesto->precio;
                @endphp
                <tr>
                    <td>{{ $repuesto->nombre }}</td>
                    <td>${{ number_format($repuesto->precio, 0, ',', '.') }}</td>
                </tr>
            @endforeach

            @php
                $totalGeneral = $subtotal + $preorden->saldo;
            @endphp

            <tr class="total">
                <td>Subtotal repuestos</td>
                <td>${{ number_format($subtotal, 0, ',', '.') }}</td>
            </tr>
            <tr class="total">
                <td>Total general (saldo + repuestos)</td>
                <td>${{ number_format($totalGeneral, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
