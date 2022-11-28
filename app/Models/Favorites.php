<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function photos() {
        return $this->hasMany(Photo::class, 'good_id', 'id')->orderBy('main', 'desc');
    }
}
