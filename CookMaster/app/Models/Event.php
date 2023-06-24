<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;


    public function users()
    {
        return $this->hasMany(User::class);
    }
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
        return $this->belongsTo(Contractor::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
