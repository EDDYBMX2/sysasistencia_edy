<?php use App\Http\Controllers\InformeController; ?>
@extends('layouts.admin')
@section('contenido')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Informe de Venta</h3>
                </div>
                <div class="col-sm-6">
                    @php($data = $searchText . '|' . $searchText2 . '|' . $searchText3 . '|' . (auth()->user()->TipoUsuario == 'PERSONAL' ? -1 : $searchText4))
                    <a href="{{ route('venta-salida.show', $data)}}" class="btn btn-default btn-sm"
                        style="float: right" target="_black"><i class="fas fa-file-pdf text-danger"></i></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                    @include('reporte.venta-salida.search')
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
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
                            @php($page = isset($_GET['page']) ? $_GET['page'] : 1)
                            @php($cont = ($page - 1) * $paginate + 1)
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
                                <td>{{$sumaTotal}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{$registro->appends(['searchText' => $searchText, 'searchText2' => $searchText2, 'searchText3' => $searchText3, 'searchText4' => $searchText4])}}
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    {{-- @push('scripts')

@endpush --}}

@endsection
