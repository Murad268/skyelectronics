<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firms extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function img($img) {
        if($img != null) {
            return 'admin/assets/images/firms/';
        } else {
            return 'admin/assets/images/';
        }
    }
}
