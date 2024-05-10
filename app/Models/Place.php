<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'alias',
        'description',
        'keywords',
        'email',
        'zip_code',
        'address',
        'number',
        'complement',
        'city',
        'state',
        'geo_location',
        'phone',
        'whatsapp',
        'website',
        'facebook',
        'instagram',
        'linkedin',
        'status',
        'category_id',
        'user_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
