<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
