<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserXRecipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'recipe_id'
    ];
    public $timestamps = false;
    protected $table = 'usersxrecipes'; 
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'recipe_id');
    }
}