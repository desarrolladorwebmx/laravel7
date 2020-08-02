<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| RELACIONES

/*
ONE-TO-ONE (Uno a Uno)
Una relación uno a uno es una relación muy básica. Por ejemplo, un modelo de usuario podría estar asociado con un teléfono.
==========================
 ONE-TO-MANY (Uno a Muchos)
Una relación de uno a muchos se utiliza para definir relaciones donde un solo modelo posee cualquier cantidad de otros modelos.
============================================================

BELONG-TO  (MUCHOS A UNO) Relciona la inversa de hasMany
Ahora que podemos acceder a todos los comentarios de una publicación, definamos una relación para permitir que un comentario acceda a su publicación principal
Para definir el inverso de una relación hasMany, defina una función de relación en el modelo secundario que llame al método belongTo:

==============================================================================
MANY-TO-MANY (MUCHOS A MUCHOS)

Las relaciones de muchos a muchos son un poco más complicadas que las relaciones hasOne y hasMany. Un ejemplo de dicha relación es un usuario con muchos roles, donde los roles también son compartidos por otros usuarios. Por ejemplo, muchos usuarios pueden tener el rol de "Admin".
*/


    //Deinir una relación
    //en este metodo vamos a implementar la relación

    //RELACION DE UNO: MUCHOS   : Tenemos un usuario tiene muchas entradas
    public function entradas(){
       return $this->hasMany('App\Models\Entrada');

    }

    //RELACION DE UNO: MUCHOS
    public function comentarios(){
       return $this->hasMany('App\Models\Comentario');

    }

//RELACION DE MUCHOS : MUCHOS . Un usaurio puede tener muchos roles y un role puede tener muchos usuarios
/*
public function userHasRoles(){
   return $this->belongsToMany('App\Role','role_user','user_id','role_id');

}
*/

}
