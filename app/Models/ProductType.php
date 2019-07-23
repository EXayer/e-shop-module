<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $timestamps = false;

    protected $fillable = ['value'];

    /**
     * Get products for product model
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
