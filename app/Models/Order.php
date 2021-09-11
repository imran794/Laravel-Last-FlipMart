<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $guarded = [];


      public function division(){
        return $this->belongsTo('App\Models\ShipDivision','division_id');
    } 

    public function district(){
        return $this->belongsTo('App\Models\ship_district','district_id');
    }
     public function state(){
        return $this->belongsTo('App\Models\Steate','state_id');
    }

     public function user(){
       return $this->belongsTo('App\Models\User','user_id');
    }
}
