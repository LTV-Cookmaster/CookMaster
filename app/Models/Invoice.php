<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'contractor_id',
        'user_id',
        'description',
        'price',
        'is_paid',
    ];


    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
