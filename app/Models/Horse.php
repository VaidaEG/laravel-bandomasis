<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    use HasFactory;
    public function horsePuntersList()
    {
        return $this->hasMany('App\Models\Punter', 'horse_id', 'id');
    }
}
