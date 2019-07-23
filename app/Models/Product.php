<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = ['product_type_id', 'attribute_set_id', 'model_number'];

    /**
     * Get model of product.
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType');
    }

    /**
     * Get AttributeSet of Product
     */
    public function attributeSet()
    {
        return $this->belongsTo('App\Models\AttributeSet');
    }

    /**
     * Generates fake 'model_number' in table seeder
     * @param ProductType $productType
     * @return string
     */
    public function fakeModelNumber(ProductType $productType) : string
    {
        return substr($productType->title, 0, 3) . '-' . $this->id;
    }
}
