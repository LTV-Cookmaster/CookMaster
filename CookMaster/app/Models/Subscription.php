<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public $incrementing = false;

protected $fillable = [
        'id',
        'name',
        'description',
        'price',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
