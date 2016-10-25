<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    //
          /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'inmuebles';
    protected $fillable = [
        'persona_id','lugar_id','tipo_id','area_total','direccion','area_construccion','observacion',
    ];
     public function dotaciones(){
        return $this->hasMany('App\Dotacion');
    }
    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }
     public function distribuciones(){
        return $this->hasMany('App\Distribucion');
    }
     public function persona(){
        return $this->belongsTo('App\Persona');
    }
   public function lugar(){
        return $this->belongsTo('App\Lugar');
    }
      public function tipo(){
        return $this->belongsTo('App\Tipo');
    }
     public function postulaciones(){
        return $this->hasMany('App\Postulacion');
    }

}
