<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRentalEquipement extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'event_id',
        'rental_equipement_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function rentalEquipement()
    {
        return $this->belongsTo(RentalEquipment::class);
    }
}
