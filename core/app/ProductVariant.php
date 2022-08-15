<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [ 'product_id','variants','stock','price'];

    public function product(){

        return $this->belongsTo('App\Product', 'product_id');

    }

}
