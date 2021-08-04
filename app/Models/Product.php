<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


  public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

      public function subcategory(){
        return $this->belongsTo('App\Models\SubCategory','subcategory_id');
    }

      public function subsubcategory(){
        return $this->belongsTo('App\Models\SubSubCategory','subsubcategory_id');
    }
}
