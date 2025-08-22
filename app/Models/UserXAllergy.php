<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserXAllergy extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'allergie_id'
    ];
    public $timestamps = false;
        protected $table = 'usersxallergies'; 
}
