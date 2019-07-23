<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    public $timestamps = false;

    protected $fillable = ['price'];

    /**
     * Attribute values that belongs to attribute set
     */
    public function attributeValues()
    {
        return $this->belongsToMany('App\Models\AttributeValue');
    }

    /**
     * Get product associated with AttributeSet
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product');
    }
}
