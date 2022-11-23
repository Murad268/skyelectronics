<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{
    use HasFactory;
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

}
