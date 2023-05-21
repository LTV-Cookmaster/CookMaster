<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'office_id',
        'name',
        'description',
        'max_capacity',
        'price',
        'is_booked',
    ];

    protected $casts = [
        'is_booked' => 'boolean',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public static function create(array $data)
    {
        $room = new Room();
        $room->id = Str::uuid();
        $room->office_id = Office::first()->id;
        $room->name = $data['name'];
        $room->description = $data['description'];
        $room->max_capacity = $data['max_capacity'];
        $room->price = $data['price'];
        $room->is_booked = $data['is_booked'];

        $room->save();

        return $room;
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

}
