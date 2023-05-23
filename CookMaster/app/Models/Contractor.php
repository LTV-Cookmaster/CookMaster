<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    public $incrementing = false;

protected $fillable = [
        'id',
        'name',
        'email',
        'phone_number',
        'address',
        'city',
        'postal_code',
        'country',
        'line_of_business',
        'company_name',
    ];

    public function quotation()
    {
        return $this->hasMany(Quotation::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function workshop()
    {
        return $this->hasMany(Workshop::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }


}
