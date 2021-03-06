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
                                    ->whereNull('boletas.deleted_at')
                                    ->select('boletas.*', 'proyectos.actividad', 'proyectos.apertura')
                                    ->get();

      $proyectos = \DB::table('proyectos')->whereNull('deleted_at')->get();

      $max   = \DB::table('boletas')->max('id');
      if ($request->ajax()) {
        return $datos;
      }else{
        return view('boleta.index', compact('datos', 'max', 'proyectos'));
      }
    }

    public function store(Request $request){
      $proyectos          = explode("|", $request->id_proyecto);
      $request["id_user"] = \Auth::user()->id;
      $proyecto           = Proyecto::find( trim($proyectos[0]) );
      $id_proyecto        = $proyecto->id;
      $monto              = 0;

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
        $dato->unidad = $request->unidad;
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
      $datos = \DB::table('boletas')->join('proyectos', 'boletas.id_proyecto', '=', 'proyectos.id')
                              ->select('boletas.id', 'boletas.fecha', 'boletas.tipo', 'boletas.ffof', 'boletas.litros', 'boletas.costo', 'boletas.monto', 'boletas.unidad',
                                        'boletas.observacion', 'boletas.id_proyecto',  'proyectos.apertura', 'proyectos.actividad')
                              ->where('boletas.id', '=', $id)
                              ->get();
      return $datos;
    }

    public function update(Request $request, $id){
      //return $request->all();
      $proyectos          = explode("|", $request->id_proyecto);
      $proyecto           = Proyecto::find( trim($proyectos[0]) );
      $id_proyecto        = $proyecto->id;

      $dato = Boleta::find($id);
      $dato->boleta     = $request->boleta;
      $dato->fecha      = date('Y-m-d', strtotime($request->fecha));
      $dato->tipo       = $request->tipo;
      $dato->litros     = $request->litros;
      $dato->costo      = $request->costo;
      $dato->monto      = $request->monto;
      $dato->unidad     = $request->unidad;
      $dato->observacion= $request->observacion;
      $dato->id_proyecto= $id_proyecto;
      $dato->id_user    = \Auth::user()->id;
      $dato->save();
      return redirect('/Boleta');
    }

    public function destroy(Request $request, $id){
      if( $request->ajax() ){
        $dato = Boleta::find($id);

        $proyecto = \App\Proyecto::find($dato->id_proyecto);
        $proyecto->presupuesto = $proyecto->presupuesto + $dato->monto;
        $proyecto->gastado     = $proyecto->gastado - $dato->monto;
        $proyecto->total       = $proyecto->presupuesto - $proyecto->gastado;
        $proyecto->save();

        $data = Boleta::find($id);
        $data->delete();
        return "Boleta Eliminada";
      }else{
        return redirect('/Boleta');
      }
    }

}
