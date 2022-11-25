<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Goods extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];

    public function categories() {
        return $this->hasOne(categories::class, 'id', 'goods__category');
    }
    public function firms() {
        return $this->hasOne(Firms::class, 'id', 'goods__firm');
    }
    public function photos() {
        return $this->hasMany(Photo::class, 'good_id', 'id')->orderBy('main', 'desc');
    }

    public function colors() {
        return $this->hasMany(Colors::class, 'id', 'color_id');
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('goods_name')
            ->saveSlugsTo('slug');
    }
    public function tagsintr($array) {

        $arr = explode(' ', $array);

        $str = '';
        for($i = 0; $i<count($arr); $i++) {
            $itm = Tags::find((int)$arr[$i]);
            if($itm) {
                if($i == 0) {
                    $del = '';
                } else {
                    $del = ', ';
                }
                $str .= $del.$itm->tag__name;
            }

        }
        return $str;
    }

    public function tagsOneIntr($array) {
        $arr = explode(' ', $array);

        $str = [];
        for($i = 0; $i<count($arr); $i++) {
            $itm = Tags::find((int)$arr[$i]);
            if($itm) {
                array_push($str, $itm);
            }

        }
        return $str;
    }
}
