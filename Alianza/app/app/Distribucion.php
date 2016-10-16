<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribucion extends Model
{
    //
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'distribuciones';
    protected $fillable = [
        'inmueble_id','detalle_id',
    ];
       public function detalle(){
        return $this->belongsTo('App\Detalle');
    }
       public function inmueble(){
        return $this->belongsTo('App\Inmueble');
    }
}
