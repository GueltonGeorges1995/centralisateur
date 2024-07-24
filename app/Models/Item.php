<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'SN',
        'BOS',
        'place_id',
        'subplace_id',
        'category_id',
        'subcategory_id',
        'department_id',
        'agent_id',
        'supplier_id',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function subplace()
    {
        return $this->belongsTo(Subplace::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
