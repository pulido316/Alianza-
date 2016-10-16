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
        'ubicacion_id','nombre','tipo',
    ];
     public function lugares(){
        return $this->hasMany('App\Lugar');
    }
     public function lugar(){
        return $this->belongsTo('App\Lugar');
    }
}
