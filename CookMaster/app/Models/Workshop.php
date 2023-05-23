<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    public $incrementing = false;

    public function quotation()
    {
        return $this->hasMany(Quotation::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function rentalEquipment()
    {
        return $this->hasMany(RentalEquipment::class);
    }

    public function contractor()
    {
        return $this->hasMany(Workshop::class);
    }
}
