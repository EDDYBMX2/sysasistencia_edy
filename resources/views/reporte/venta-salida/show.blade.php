<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Salida Venta</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 0.80em;
        }
        table {
            /* margin-left: auto;
            margin-right: auto; */
            border-collapse: collapse;
            border-color: rgb(0, 0, 0);
            width: 100%;
        }
        td {
            padding: 3px;
            border: 1px solid rgb(37, 87, 134);
        }
        th{
            padding: 3px; border: 1px solid rgb(37, 87, 134);
            background: #eaf3fa;
            color: #12446b;
        }

    </style>
</head>
<body>
    <table style="margin-bottom: 0.80em">
        <tr>
            <td style="border:none">
                @if (!empty($empresa->Logo))
                    <img src="../public/logo/{{$empresa->Logo}}" alt="" width="80" height="80">
                @endif
            </td>
            <td style="border:none; text-align: right">
                {{$empresa->nomEmpresa}} <br>
                {{$empresa->Direccion}}
            </td>
        </tr>
    </table>
    <h3 style="text-align: center">REPORTE VENTA</h3>
    <table>
        <thead style="background: #eaf3fa; color: #12446b">
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Sucursal</th>
                <th>Personal</th>
                <th style="text-align: center">SMART</th>
                <th style="text-align: center">KIT</th>
                <th style="text-align: center">SIM</th>
                <th style="text-align: center">PLAN</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php($cont = 1)
            @php($sumaSmart = 0)
            @php($sumaKit = 0)
            @php($sumaSim = 0)
            @php($sumaPlan = 0)
            @php($sumaTotal = 0)
            @foreach ($registro as $item)
                <tr>
                    <td>{{$cont++}}</td>
                    <td>{{date('d/m/Y', strtotime($item->fecVS))}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->Nombres}}</td>
                    <td style="text-align: center">{{$item->smart}}</td>
                    <td style="text-align: center">{{$item->kit}}</td>
                    <td style="text-align: center">{{$item->sim}}</td>
                    <td style="text-align: center">{{$item->plan}}</td>
                    <td></td>
                </tr>
                @php($sumaSmart += $item->smart)
                @php($sumaKit += $item->kit)
                @php($sumaSim += $item->sim)
                @php($sumaPlan += $item->plan)
            @endforeach
            @php($sumaTotal = $sumaSmart + $sumaKit + $sumaSim + $sumaPlan)
            <tr style="font-weight: bold">
                <td colspan="4"> SUMA TOTAL</td>
                <td style="text-align: center">{{$sumaSmart}}</td>
                <td style="text-align: center">{{$sumaKit}}</td>
                <td style="text-align: center">{{$sumaSim}}</td>
                <td style="text-align: center">{{$sumaPlan}}</td>
                <td style="text-align: center">{{$sumaTotal}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
