<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steate extends Model
{
    use HasFactory;
     protected $guarded = [];

      public function division(){
        return $this->belongsTo('App\Models\ShipDivision','division_id');
    } 

    public function district(){
        return $this->belongsTo('App\Models\ship_district','district_id');
    }
}
