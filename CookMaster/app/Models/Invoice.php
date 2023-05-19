<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'workshop_id',
        'subscription_id',
        'contractor_id',
        'user_id',
        'description',
        'price',
        'is_paid',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function subscriptions()
    {
        return $this->belongsTo(Subscription::class);
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
