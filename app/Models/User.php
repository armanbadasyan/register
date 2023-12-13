<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{


    use HasApiTokens, Notifiable, HasFactory;
    protected $fillable =['name','email','password','surname'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }
}

