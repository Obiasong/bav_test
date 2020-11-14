<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Fortify\TwoFactorAuthenticatable;
// use Laravel\Jetstream\HasProfilePhoto;
// use Laravel\Jetstream\HasTeams;
// use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

use Auth;

class Product extends Model
{
    /**
     * The attribute that is mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product'
    ];
}
