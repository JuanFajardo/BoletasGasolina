<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Boleta extends Model
{
  use SoftDeletes;
  protected $table    = 'boletas';
  protected $fillable = ['id', 'boleta', 'fecha', 'tipo', 'ffof', 'litros', 'costo', 'monto', 'unidad', 'observacion', 'id_user', 'id_proyecto'];
  protected $dates    = ['deleted_at'];
}
