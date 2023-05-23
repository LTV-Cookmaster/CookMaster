<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'subscription_type',
        'start_date',
        'end_date',
        'subscription_price',
        'price_per_month',
        'annual_price',
        'advertising',
        'commenting',
        'lessons',
        'chat',
        'discount',
        'free_delivery',
        'kitchen_space',
        'exclusive_events',
        'referral_reward',
        'renewal_bonus',
    ];

    /**
     * Obtient l'utilisateur associé à l'abonnement.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Détermine si l'abonnement est actif.
     *
     */
    public function isActive()
    {
        return $this->end_date >= now();
    }

}
