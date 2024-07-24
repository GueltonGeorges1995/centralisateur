<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
    ];

    public function subplaces()
    {
        return $this->hasMany(Subplace::class);
    }

    public function items() {

        return $this->hasMany(Item::class);
    }
}
