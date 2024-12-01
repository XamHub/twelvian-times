<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
class Newsletter extends Model
{
    protected $fillable = [
        'subject',
        'slug',
        'thumbnail',
        'description',
        'blocks',
        'author',
        'published_at',
    ];

    protected $casts = [
        'blocks' => 'json',
        'published_at' => 'datetime',
        'thumbnail' => 'string',
    ];

    protected static function booted()
    {
        static::saving(function ($newsletter) {
            $newsletter->slug = Str::slug($newsletter->subject);
        });

        Route::model('newsletter', Newsletter::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}