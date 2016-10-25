<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
               /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'personas';
    protected $fillable = [
        'nombre','apellido','email','documento_id','telefono','observacion',
    ];
     public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }
}
