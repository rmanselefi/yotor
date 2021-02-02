<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryProduct extends Model
{
    //
    protected $table = 'sub_category_products';

    protected $fillable = ['product_id', 'sub_category_id'];
}
