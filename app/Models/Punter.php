<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punter extends Model
{
    use HasFactory;

    public function punterHorse()
    {
        return $this->belongsTo('App\Models\Horse', 'horse_id', 'id');
    }
}
