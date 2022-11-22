<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tags extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('tag__name')
            ->saveSlugsTo('slug');
    }
}
