<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;


class Product extends Model
{
    use HasFactory;

    public function get_cat(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function get_brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
