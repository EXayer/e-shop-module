<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    protected $fillable = ['title'];

    /**
     * Get values for attribute
     */
    public function attributeValues()
    {
        return $this->hasMany('App\Models\AttributeValue');
    }
}
