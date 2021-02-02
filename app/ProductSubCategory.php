<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    //
    protected $table = 'product_sub_category';
    protected $fillable = ['product_id', 'sub_category_id'];
}
