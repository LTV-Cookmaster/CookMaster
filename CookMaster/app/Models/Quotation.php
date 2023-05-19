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
        'workshop_id',
        'contractor_id',
        'user_id',
        'description',
        'price',
        'is_accepted',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function contractors()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
