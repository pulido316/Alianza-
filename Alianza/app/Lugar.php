<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    //
             /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'lugares';
    protected $fillable = [
        'nombre','tipo','ubicacion_id',
    ];
    public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }
   /*  public function lugares(){
        return $this->hasMany('App\Lugar');
    }
     public function lugar(){
        return $this->belongsTo('App\Lugar');
    }*/
}
