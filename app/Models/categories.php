<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function goods() {
        return $this->hasMany(Goods::class, 'goods__category', 'id');
    }

}
