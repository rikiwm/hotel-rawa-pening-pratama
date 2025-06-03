<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\CropPosition;
use Spatie\MediaLibrary\Conversions\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Room extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug;
    protected $guarded = [];
    protected $casts = [
        'room_fasilitas' => 'array',
        'tag' => 'array',
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_room')
            ->saveSlugsTo('slug');
    }

    public function typeRoom()
    {
        return $this->belongsTo(Categori::class,'type_room');
    }

    // public function tagRoom()
    // {
    //     return $this->belongsTo(Tag::whereIn('id', 'tag'));
    // }

}
