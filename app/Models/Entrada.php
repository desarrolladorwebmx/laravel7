<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'titulo', 'contenido', 'user_id',
    ];

  // Relacion: MUCHOS : UNO :Tenemos larelacion de  muchas entradas para un usuario
        public function user(){
           return $this->belongsTo('App\User');
        }


// Relacion: UNO : UNO : Tenemos la relacion una entrada solo puede tener un comentario
        public function comentarios(){
           return $this->hasOne('App\Models\Comentario');

        }

}
