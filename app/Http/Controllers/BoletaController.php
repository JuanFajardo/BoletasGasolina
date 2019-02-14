<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boleta;
use App\Proyecto;
class BoletaController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request){
      $datos = \DB::table('boletas')->join('proyectos', 'boletas.id_proyecto', '=', 'proyectos.id')
                                    ->whereNull('deleted_at')
                                    ->select('boletas.*', 'proyectos.actividad', 'proyectos.apertura')
                                    ->get();
      $proyectos = \DB::table('proyectos')->get();
      $max   = \DB::table('boletas')->max('id');
      if ($request->ajax()) {
        return $datos;
      }else{
        return view('boleta.index', compact('datos', 'max', 'proyectos'));
      }
    }

    public function store(Request $request){
      $proyectos = explode("|", $request->id_proyecto);
      $request["id_user"] = \Auth::user()->id;
      $proyecto = Proyecto::Where('apertura', '=', trim($proyectos[0]) )->get();
      $id_proyecto = $proyecto[0]->id;
      $monto = 0;

      if($request->tipo == "combustible"){
        $dato = new Boleta;
        $dato->boleta = $request->boleta;
        $dato->fecha  = date('Y-m-d', strtotime($request->fecha));
        $dato->tipo   = $request->tipo;
        $dato->ffof   = $request->ffof;
        $dato->litros = $request->litros;
        $dato->costo  = $request->costo;
        $dato->monto  = $request->monto;
        $dato->unidad = $request->unidad;
        $dato->observacion  = $request->observacion;
        $dato->id_user= \Auth::user()->id;
        $dato->id_proyecto  = $id_proyecto;
        $dato->save();
        $monto = $request->monto;
      }else{
        $dato = new Boleta;
        $dato->boleta = $request->boleta;
        $dato->fecha  = date('Y-m-d', strtotime($request->fecha));
        $dato->tipo   = $request->tipo;
        $dato->litros = "0";
        $dato->costo  = "0";
        $dato->monto  = $request->monto1;
        $dato->unidad = $request->unidad1;
        $dato->observacion  = $request->observacion;
        $dato->id_user= \Auth::user()->id;
        $dato->id_proyecto  = $id_proyecto;
        $dato->save();
        $monto = $request->monto1;
      }
      $proyecto = Proyecto::find($id_proyecto);
      //['id', 'apertura', 'actividad', 'distrito', 'presupuesto', 'gastado', 'total', 'id_user'];
      $gastado  = $proyecto->gastado + $monto;
      $total    = $proyecto->total  - $monto;

      $proyecto = Proyecto::find($id_proyecto);
      $proyecto->gastado  = $gastado;
      $proyecto->total    = $total;
      $proyecto->id_user  = \Auth::user()->id;
      $proyecto->save();
      return redirect('/Boleta');
    }

    public function show($id){
      $datos = Boleta::Where('id', '=', $id)->get();
      return $datos;
    }

    public function update(Request $request, $id){
      $dato = Boleta::find($id);
      $dato->boleta     = $request->boleta;
      $dato->fecha      = date('Y-m-d', strtotime($request->fecha));
      $dato->tipo       = $request->tipo;
      $dato->litros     = $request->litros;
      $dato->costo      = $request->costo;
      $dato->monto      = $request->monto;
      $dato->unidad     = $request->unidad;
      $dato->observacion= $request->observacion;
      $dato->id_proyecto= $request->id_proyecto;
      $dato->id_user    = \Auth::user()->id;
      $dato->save();
      return redirect('/Boleta');
    }

    public function destroy(Request $request, $id){
      if( $request->ajax() ){
        $dato = Boleta::find($id);
        $dato->delete();
        return "Boleta Eliminada";
      }else{
        return redirect('/Boleta');
      }
    }


}
