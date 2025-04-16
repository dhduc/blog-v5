<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

    protected $fillable = [
        'user',
        'url',
        'image_url',
        'title',
        'description',
        'is_sponsored',
        'is_approved',
    ];

    protected function casts() : array
    {
        return [
            'is_sponsored' => 'boolean',
            'is_approved' => 'datetime',
            'is_declined' => 'datetime',
        ];
    }

    public function scopeApproved(Builder $query) : void
    {
        $query
            ->whereNotNull('is_approved')
            ->whereNull('is_declined');
    }

    public function scopeDeclined(Builder $query) : void
    {
        $query
            ->whereNotNull('is_declined')
            ->whereNull('is_approved');
    }
}
