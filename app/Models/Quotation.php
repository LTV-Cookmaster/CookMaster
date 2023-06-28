<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'contractor_id',
        'description',
        'price',
        'is_accepted',
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
