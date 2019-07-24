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

    /**
     * Select all related data to the ProductType
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getFullProductModifications()
    {
        $query = Product::query()
            ->where('products.product_type_id', $this->id);

        $query->join('attribute_sets', 'attribute_sets.id', '=', 'products.id')
            ->join(
                'attribute_set_attribute_value as pivot_set_value',
                'pivot_set_value.attribute_set_id',
                'attribute_sets.id'
            )
            ->join('attribute_values', 'attribute_values.id', 'pivot_set_value.attribute_value_id')
            ->join('attributes', 'attributes.id', 'attribute_values.attribute_id');

        $query->select(
            'products.id as product_id',
            'products.model_number',
            'attribute_sets.price',
            'attribute_values.value as attribute_value',
            'attribute_values.id as value_id',
            'attributes.title as attribute',
            'attributes.id as attribute_id'
        );

        return $query->get();
    }
}
