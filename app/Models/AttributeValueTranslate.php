<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValueTranslate extends Model
{
    public $timestamps = false;

    protected $fillable = ['language_id', 'attribute_value_id', 'value'];
}
