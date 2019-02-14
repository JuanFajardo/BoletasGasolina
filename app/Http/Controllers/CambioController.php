<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cambio;

class CambioController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request){
      $datos = Cambio::all();
      $datos = \DB::table('cambios')->join('proyectos', 'cambios.id_proyecto', '=', 'proyectos.id')
                                    ->whereNull('cambios.deleted_at')
                                    ->select('cambios.*', 'proyectos.apertura', 'proyectos.actividad')
                                    ->get();
      if ($request->ajax()) {
        return $datos;
      }else{
        return view('cambio.index', compact('datos'));
      }
    }

    public function store(Request $request){
      $dato = new Cambio;
      $request["id_user"] = \Auth::user()->id;
      $dato->fill($request->all());
      $dato->save();

      return redirect('/Cambio');
    }

    public function show($id){
      $datos = Cambio::Where('id', '=', $id)->get();
      return $datos;
    }

    public function update(Request $request, $id){
      $dato = Cambio::find($id);
      $dato->fecha          = $request->fecha;
      $dato->monto_antiguo  = $request->monto_antiguo;
      $dato->monto_nuevo    = $request->monto_nuevo;
      $dato->observacion    = $request->observacion;
      $dato->id_proyecto    = $request->id_proyecto;
      $dato->id_user        = \Auth::user()->id;
      $dato->save();
      return redirect('/Cambio');
    }

    public function destroy(Request $request, $id){
      if( $request->ajax() ){
        $dato = Cambio::find($id);
        $dato->delete();
        return "Cambio Eliminado";
      }else{
        return redirect('/Cambio');
      }
    }


}
