<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

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
        'created_at',
        'updated_at',
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
        $user->referee_code = Str::random(10);

        $user->save();

        return $user;
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
