<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    public $timestamps = false;

    protected $fillable = ['value'];

    /**
     * Attribute sets that belongs to attribute value
     */
    public function attributeSets()
    {
        return $this->belongsToMany('App\Models\AttributeSet');
    }

    /**
     * Get the post that owns the comment.
     */
    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute');
    }
}
