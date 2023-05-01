<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

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
