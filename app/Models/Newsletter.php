<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Newsletter extends Model
{
    protected $fillable = [
        'subject',
        'slug',
        'body',
        'author',
        'published_at',
    ];
    protected static function booted()
    {
        static::saving(function ($newsletter) {
            $newsletter->slug = Str::slug($newsletter->subject);
        });
    }
}