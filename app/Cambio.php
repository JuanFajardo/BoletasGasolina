<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cambio extends Model
{
  use SoftDeletes;
  protected $table    = 'cambios';
  protected $fillable = ['id', 'fecha', 'monto_antiguo', 'monto_nuevo', 'observacion', 'id_user', 'id_proyecto'];
  protected $dates    = ['deleted_at'];
}
