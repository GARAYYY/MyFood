<?php

use Illuminate\Support\Facades\Route;
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

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::get('/', function () {
    return view('pages.LoginView');
});

Route::get('/register', function () {
    return view('pages.RegisterView');
});

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/allergies', [AllergyController::class, 'store']);

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/ingredients', [IngredientController::class, 'store']);
Route::get('/ingredients/show', [IngredientController::class, 'show']);

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/instructions', [InstructionController::class, 'store']);

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::get('/home', [RecipeController::class, 'indexView'])->name('home'); 
Route::post('/recipes/store', [RecipeController::class, 'store']);
Route::get('/recipes/detail/{id}', [RecipeController::class, 'detailView'])->name('recipedetail');

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/tags', [TagController::class, 'store']);

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::post('/register', [UserController::class, 'register']);
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
Route::get('/favourites/show/{id}', [UserXRecipeController::class, 'show']);
