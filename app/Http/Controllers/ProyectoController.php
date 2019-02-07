<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Cambio;

class ProyectoController extends Controller
{

  public function __construct(){
  //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Proyecto::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('proyecto.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Proyecto;
    $request["gastado"] = "0";
    $request["total"]   = $request->presupuesto;
    $dato->fill($request->all());
    $dato->save();

    return redirect('/Proyecto');
  }

  public function show($id){
    $datos = Proyecto::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Proyecto::find($id);
    if( $dato->presupuesto != $request->presupuesto ){
      $cambio = new Cambio;
      $cambio->fecha          = date('Y-m-d');
      $cambio->monto_antiguo  = $dato->presupuesto;
      $cambio->monto_nuevo    = $request->presupuesto;
      $cambio->observacion    = isset($request->observacion) ? $request->observacion : "Nada" ;
      $cambio->id_user        = '1'; //Auth::user()->id;
      $cambio->id_proyecto    = $id;
      $cambio->save();
    }
    $dato = Proyecto::find($id);
    $dato->apertura   = $request->apertura;
    $dato->actividad  = $request->actividad;
    $dato->distrito   = $request->distrito;
    $dato->presupuesto= $request->presupuesto;
    $dato->total      = $request->presupuesto;
    $dato->id_user    = '1'; //Auth::user()->id;
    $dato->save();
    return redirect('/Proyecto');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Proyecto::find($id);
      $dato->delete();
      return "Proyecto Eliminado";
    }else{
      return redirect('/Proyecto');
    }
  }


}
