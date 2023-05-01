<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'postal_code',
        'city',
        'country',
        'number_of_rooms',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }



}
