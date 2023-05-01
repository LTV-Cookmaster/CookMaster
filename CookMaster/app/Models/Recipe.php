<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'category',
        'type',
        'gastronomy',
        'prep_time',
        'cooking_time',
        'number_of_persons',
        'is_bookmarked',
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
