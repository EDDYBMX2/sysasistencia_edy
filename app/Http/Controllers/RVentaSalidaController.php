<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\Empresa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RVentaSalidaController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $mytime = Carbon::now('America/Lima');
        $paginate = 10;
        if ($request) {
            $searchText = empty($request->get('searchText')) ? date('Y-m-01', strtotime($mytime->toDateString())) : $request->get('searchText');
            $searchText2 = empty($request->get('searchText')) ? date('Y-m-t', strtotime($mytime->toDateString())) : $request->get('searchText2');
            $searchText3 = empty($request->get('searchText3')) ? -1 : $request->get('searchText3');
            $searchText4 = $request->get('searchText4');
            $registro = DB::table('venta_salida as vs')->join('registro as r', 'vs.IdRegistro', 'r.IdRegistro')
                ->join('usuario as u', 'r.IdUsuario', 'u.IdUsuario')
                ->join('branch_office as b', 'u.idBranch_office', 'b.id')
                ->whereBetween('fecVS', [$searchText, $searchText2])
                ->where('id', $searchText3 == -1 ? '!=' : '=', $searchText3)
                ->where('Nombres', 'LIKE', '%' . (auth()->user()->TipoUsuario == 'PERSONAL' ? auth()->user()->Nombres : $searchText4) . '%')
                ->paginate($paginate);
            $sucursal = BranchOffice::all();

            return view('reporte.venta-salida.index', compact("registro", "sucursal", "paginate", "searchText", "searchText2", "searchText3", "searchText4"));
        }
    }
    public function show($id)
    {
        $id = explode('|', $id);
        $registro = DB::table('venta_salida as vs')->join('registro as r', 'vs.IdRegistro', 'r.IdRegistro')
            ->join('usuario as u', 'r.IdUsuario', 'u.IdUsuario')
            ->join('branch_office as b', 'u.idBranch_office', 'b.id')
            ->whereBetween('fecVS', [$id[0], $id[1]])
            ->where('id', $id[2] == -1 ? '!=' : '=', $id[2])
            ->where('Nombres', 'LIKE', '%' . (auth()->user()->TipoUsuario == 'PERSONAL' ? auth()->user()->Nombres : $id[3]) . '%')
            ->get();

            $empresa = Empresa::first();
            $pdf = \PDF::loadView('reporte.venta-salida.show', compact("registro", "empresa"));
            // ->setPaper('a4', 'landscape');
            return $pdf->stream();
    }
}
