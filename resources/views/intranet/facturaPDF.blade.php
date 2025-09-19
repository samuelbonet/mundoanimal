<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura {{ $factura->id_factura }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Factura #{{ $factura->id_factura }}</h2>

    <p><strong>Cliente:</strong> {{ $factura->cliente->nombre }} {{ $factura->cliente->apellidos }}</p>
    <p><strong>Fecha de Emisión:</strong> {{ $factura->fecha_emision->format('d/m/Y H:i') }}</p>
    <p><strong>Concepto:</strong> {{ $factura->concepto }}</p>
    <p><strong>Precio:</strong> {{ number_format($factura->precio, 2) }} €</p>
</body>
</html>
