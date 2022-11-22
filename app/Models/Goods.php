<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories() {
        return $this->hasOne(categories::class, 'id', 'goods__category');
    }
    public function firms() {
        return $this->hasOne(firms::class, 'id', 'goods__firm');
    }
}
