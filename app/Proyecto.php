<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
  use SoftDeletes;
  protected $table    = 'proyectos';
  protected $fillable = ['id', 'apertura', 'actividad', 'distrito', 'presupuesto', 'gastado', 'total', 'id_user'];
  protected $dates    = ['deleted_at'];
}
