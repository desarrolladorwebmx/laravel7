<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
  //
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
      'contenido', 'user_id', 'entrada_id',
  ];

//Propiedades a Agregar
  protected $table ="comentarios";
  protected $primaryKey = "id";


    // Relacion: MUCHOS : UNO
  public function entradas(){
     return $this->belongsTo('App\Models\Entrada');
  }


    // Relacion: MUCHOS : UNO
  public function user(){
     return $this->belongsTo('App\User');
  }
}
