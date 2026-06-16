<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemReceipt extends Model
{
    protected $fillable = [
        'found_item_id',
        'receiver_name',
        'receiver_at',
        'notes',
    ];

    public function foundItem()
    {
        return $this->belongsTo(FoundItem::class);
    }
}