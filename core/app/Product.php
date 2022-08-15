<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ 'name'];

    public function productvariants(){

        return $this->hasMany('App\ProductVariant', 'product_id');

    }

}
