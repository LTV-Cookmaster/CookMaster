<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory, HasUuids;

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

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function quotation()
    {
        return $this->hasMany(Quotation::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function workshop()
    {
        return $this->hasMany(Workshop::class);
    }

}
