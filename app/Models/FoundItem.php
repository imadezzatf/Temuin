<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClaimRequest;

class FoundItem extends Model
{
    protected $fillable = [
        'reporter_name',
        'reporter_phone',
        'item_name',
        'category_id',
        'security_post_id',
        'created_by',
        'photo',
        'description',
        'location_found',
        'found_at',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function securityPost()
    {
        return $this->belongsTo(SecurityPost::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function receipt()
    {
        return $this->hasOne(ItemReceipt::class);
    }

    public function claimRequests()
    {
        return $this->hasMany(ClaimRequest::class);
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'found_item_tags',
            'found_item_id',
            'tag_id'
        );
    }
}
