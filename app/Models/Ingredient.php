<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_gluten_free',
        'is_vegan'
    ];
    public $timestamps = false;
    protected $primaryKey = 'ingredient_id';
    public function recipes()
    {
        return $this->belongsToMany(
            Recipe::class,
            'recipesxingredients',
            'ingredient_id',
            'recipe_id'
        )->withPivot('quantity');
    }
}
