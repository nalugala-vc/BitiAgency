<?php


namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Admin extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;
    protected $guard='admins';

    protected $fillable=[
        'name','email','password','phone_number','profile_pic'
    ];

    protected $hidden = [
        'password',
    ];
}
