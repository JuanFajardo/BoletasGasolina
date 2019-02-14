<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boleta;
use App\Proyecto;
use App\Cambio;

class ReporteController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $proyectos = Proyecto::all();
      return view('reporte.index', compact('proyectos'));
    }

    public function reporte(Request $request){
      $inicio     = date("d-m-Y",strtotime($request->inicio."- 1 days")); 	    //"2019-02-01"
      $fin	      = date("d-m-Y",strtotime($request->fin."+ 1 days"));       //"2019-02-28"
      $ffof       = $request->ffof;	      //"todo"
      $tipo       = $request->tipo;	      //"todo"
      $combustible= $request->combustible;	//null
      $usuario    = $request->usuario;	      //null
      $id_proyecto= $request->id_proyecto;	//"todo"
      $btn	      = $request->btn;       //"pdf"
      $vista      = 'reporte.pdf';

      $raw1 =  $ffof        != "todo" ? "boletas.ffof       = '".$ffof."' " : " 1 = 1 ";
      $raw2 =  $tipo        != "todo" ? "boletas.tipo       = '".$tipo."' " : " 1 = 1 ";
      $raw3 =  $combustible != null   ? "boletas.combustible= '".$combustible."' " : " 1 = 1 ";
      $raw4 =  $usuario     != null   ? "boletas.id_user    = '".$usuario."' " : " 1 = 1 ";
      $raw5 =  $id_proyecto != "todo" ? "boletas.id_proyecto= '".$id_proyecto."' " : " 1 = 1 ";



      $datos = \DB::table('boletas')->join('proyectos', 'boletas.id_proyecto', '=', 'proyectos.id')
                                    ->join('users', 'boletas.id_user', '=', 'users.id')
                                    ->whereNull('boletas.deleted_at')
                                    ->where('boletas.fecha', '>', $inicio)
                                    ->where('boletas.fecha', '<', $fin)
                                    ->whereRaw($raw1)
                                    ->whereRaw($raw2)
                                    ->whereRaw($raw3)
                                    ->whereRaw($raw4)
                                    ->whereRaw($raw5)
                                    ->select('boletas.*', 'proyectos.*', 'users.name', 'users.email')
                                    ->get();
      if($btn != "pdf"){
        return view($vista, compact('datos', 'inicio', 'fin'));
      }else{
        $pdf = \PDF::loadView($vista, compact('datos', 'inicio', 'fin'));
        return $pdf->download('listado.pdf');
      }
      return $request->all();
    }
}
