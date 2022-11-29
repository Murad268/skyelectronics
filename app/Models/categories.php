<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class categories extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('goods_name')
            ->saveSlugsTo('slug');
    }
    public function goods() {
        return $this->hasMany(Goods::class, 'goods__category', 'id');
    }

}
