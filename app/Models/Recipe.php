<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'cooking_time',
        'difficulty',
        'servings',
        'image_url',
        'created_by',
        'created_at'
    ];
    public $timestamps = false;
    protected $primaryKey = 'recipe_id';
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipesxingredients', 'recipe_id', 'ingredient_id')
            ->withPivot('quantity');
    }
    public function instructions()
    {
        return $this->hasMany(Instruction::class, 'recipe_id', 'recipe_id')
            ->orderBy('step_number');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }
}
