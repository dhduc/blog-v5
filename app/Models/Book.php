<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'heading',
        'cover_image',
        'content_image',
        'price',
        'sale_price',
        'desc',
        'chapters',
        'reviews',
        'author',
        'job_title',
        'author_avatar',
        'author_desc',
        'phone',
        'email',
        'location',
        'footer_desc',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chapters' => 'array',
        'reviews' => 'array',
    ];
}
