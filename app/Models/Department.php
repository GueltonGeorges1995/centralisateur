<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function items() {

        return $this->hasMany(Item::class);
    }
}
