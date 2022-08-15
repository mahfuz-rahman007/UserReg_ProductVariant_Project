<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    protected $fillable = ['name'];

    public function attributevalues(){

        return $this->hasMany('App\AttributeValue', 'attribute_id');

    }
}
