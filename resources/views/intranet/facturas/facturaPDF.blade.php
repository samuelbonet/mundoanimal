<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recibo {{ $factura->id_factura }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
            position: relative;
            min-height: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #28a745;
            padding-bottom: 10px;
        }

        .header .title {
            font-size: 22px;
            font-weight: bold;
            color: #28a745;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #28a745;
            color: #fff;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 11px;
            color: #555;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .footer-logo {
            max-width: 70px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    {{-- Encabezado --}}
    <div class="header">
        <div class="title">Clínica Veterinaria Mundo Animal - Recibo</div>
    </div>

    {{-- Tabla --}}
    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha de Emisión</th>
                <th>Concepto</th>
                <th>Precio (€)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $factura->cliente->nombre }} {{ $factura->cliente->apellidos }}</td>
                <td>{{ $factura->fecha_emision->format('d/m/Y H:i') }}</td>
                <td>{{ $factura->concepto }}</td>
                <td>{{ number_format($factura->precio, 2, ',', '.') }} €</td>
            </tr>
        </tbody>
    </table>

    {{-- Footer --}}
    <div class="footer">
        Clínica Veterinaria Mundo Animal - Calle Veterinaria 123, Zaragoza, España - Tel: 900 123 456 <br>
        Este documento es generado automáticamente y no requiere firma. <br>
        <img src="{{ public_path('img/pagina/index/logo.png') }}" alt="Logo" class="footer-logo">
    </div>

</body>

</html>
