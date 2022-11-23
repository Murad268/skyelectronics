<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function goods() {
        return $this->hasOne(Goods::class, 'id', 'good_id');
    }
}
