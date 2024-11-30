<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Newsletter extends Model
{
    protected $fillable = [
        'subject',
        'slug',
        'thumbnail',
        'blocks',
        'author',
        'published_at',
    ];

    protected $casts = [
        'blocks' => 'array',
        'published_at' => 'datetime',
        'thumbnail' => 'string',
    ];

    protected static function booted()
    {
        static::saving(function ($newsletter) {
            $newsletter->slug = Str::slug($newsletter->subject);
        });
    }
}