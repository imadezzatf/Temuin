<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemLog extends Model
{
    protected $fillable = [
        'found_item_id',
        'action',
    ];

    public function foundItem()
    {
        return $this->belongsTo(FoundItem::class);
    }
}