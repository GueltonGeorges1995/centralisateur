<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subplace extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'place_id',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function items() {

        return $this->hasMany(Item::class);
    }
}
