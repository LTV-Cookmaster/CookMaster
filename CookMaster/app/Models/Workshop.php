<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function rentalEquipments()
    {
        return $this->hasMany(RentalEquipment::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
