<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = md5($value);
    // }
    // public function setFirstNameAttribute($value)
    // {
    //     // $this->attributes['first_name'] = strtoupper($value) . "aaa" ?? null;
    //     $this->attributes['first_name'] = $value ?? null;
    // }
    // public function setLastNameAttribute($value)
    // {
    //     $this->attributes['lastName'] = $value ?? null;
    // }
    // public function setPhoneNumberAttribute($value)
    // {
    //     $this->attributes['phoneNumber'] = $value ?? null;
    // }

    // public function setUserAddressAttribute($value)
    // {
    //     $this->{'extra_info->userAddress'} = $value ?? null;
    // }
    // public function setUserBlodGroupAttribute($value)
    // {
    //     $this->{'extra_info->userBlodGroup'} = $value ?? null;
    // }

    // //accessors

    // // $this->attributes['password'] = md5($value);

    // public function getPasswordAttribute($value)
    // {
    //     // return $value;
    //     return $this->attributes['password'];
    // }

    // public function getFirstNameAttribute($value)
    // {
    //     return Str::ucfirst($value);
    // }
    // public function getLastNameAttribute($value)
    // {
    //     return Str::ucfirst($value);
    // }
    // public function getPhoneNumberAttribute($value)
    // {
    //     return $value;
    // }

    // public function getUserAddressAttribute()
    // {
    //     return  Str::upper($this->extra_info['userAddress']) ?? null;
    // }
    // public function getUserBlodGroupAttribute()
    // {
    //     return $this->extra_info['userBlodGroup'] ?? null;
    // }
    // // public function getLastNameAttribute()
    // // {
    // //     return $this->ad_attributes['lastName'] ?? null;
    // // }
    // // public function getPhoneNumberAttribute()
    // // {
    // //     return $this->ad_attributes['phoneNumber'] ?? null;
    // // }
    // // public function setUnitNumberAttribute($value)
    // // {
    // //     $this->attributes['unit_no'] = $value ?? null;
    // // }
}
