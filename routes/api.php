<?php

use App\Http\Controllers\AllergyController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeXIngredientController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserXRecipeController;
use App\Models\RecipeXTag;
use App\Models\UserXAllergy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/allergies', [AllergyController::class, 'store']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/ingredients', [IngredientController::class, 'store']);
route::get('/ingredients/show', [IngredientController::class, 'show']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/instructions', [InstructionController::class, 'store']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/recipes/store', [RecipeController::class, 'store']);
Route::get('/recipes/show', [RecipeController::class, 'show']);
Route::get('/recipes/detail/{id}', [RecipeController::class, 'showDetail']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/tags', [TagController::class, 'store']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/register', action: [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/user/show/{id}', [UserController::class, 'show']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/recipesxingredients', [RecipeXIngredientController::class, 'store']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/recipesxtags', [RecipeXTag::class, 'store']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/usersxallergies', [UserXAllergy::class, 'store']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/favourites/{id}', [UserXRecipeController::class, 'store']);
Route::get('/favourites/check/{id}', [UserXRecipeController::class, 'favouritesButton']);
Route::get('/favourites/show/{id}',[UserXRecipeController::class,'show']);
//////////////////////////////////////////////////
//////////////////////////////////////////////////