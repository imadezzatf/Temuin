<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function foundItems()
    {
        return $this->belongsToMany(
            FoundItem::class,
            'found_item_tags',
            'tag_id',
            'found_item_id'
        );
    }
}