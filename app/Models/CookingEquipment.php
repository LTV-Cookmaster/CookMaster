<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingEquipment extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'category',
        'available_quantity',
        'price',
    ];

    public function cookingEquipment()
    {
        return $this->belongsTo(CookingEquipment::class);
    }
}
