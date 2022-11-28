<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function photos() {
        return $this->hasMany(Photo::class, 'good_id', 'good_id')->orderBy('main', 'desc');
    }
}
