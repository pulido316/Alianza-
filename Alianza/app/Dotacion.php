<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dotacion extends Model
{
    //
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'dotaciones';
    protected $fillable = [
        'inmueble_id','servicio_id',
    ];
       public function servicio(){
        return $this->belongsTo('App\Servicio');
    }
       public function inmueble(){
        return $this->belongsTo('App\Inmueble');
    }
}
