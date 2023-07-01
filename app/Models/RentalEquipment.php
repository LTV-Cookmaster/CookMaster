<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RentalEquipment extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'office_id',
        'price',
    ];

    public static function create(array $data): RentalEquipment
    {
        $equipement = new static;
        $equipement->id = Str::uuid();
        $equipement->name = $data['name'];
        $equipement->description = $data['description'];
        $equipement->office_id = $data['office_id'];
        $equipement->price = $data['price'];
        $equipement->save();
        return $equipement;
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }

    public function offices()
    {
        return $this->belongsTo(Office::class);
    }
}
