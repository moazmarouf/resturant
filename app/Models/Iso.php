<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iso extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this->hasMany('App\Models\User');
    }
}
