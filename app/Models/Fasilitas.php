<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Fasilitas extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasSlug;
    protected $guarded = [];
    protected $casts = [
        'tag' => 'array',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_fasilitas')
            ->saveSlugsTo('slug');
    }



}
