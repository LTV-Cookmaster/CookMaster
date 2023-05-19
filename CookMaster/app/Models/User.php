<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'postal_code',
        'city',
        'country',
        'phone',
        'referral_code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function create(array $data)
    {
        $user = new static;
        $user->id = Str::uuid();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->postal_code = $data['postal_code'];
        $user->city = $data['city'];
        $user->country = $data['country'];
        $user->phone = $data['phone'];
        $user->password = Hash::make($data['password']);
        $user->referral_code = Str::random(10);

        $user->save();

        return $user;
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }


}
