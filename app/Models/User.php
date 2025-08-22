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
    protected $fillable = [
        'name',
        'email',
        'password',
        'cooking_skill',
        'diet_type',
        'created_at'
    ];
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'created_by', 'user_id');
    }
}
