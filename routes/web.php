<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeXIngredientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserXRecipeController;

//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::get('/', function () {
    return view('pages.LoginView');
});

Route::get('/register', function () {
    return view('pages.RegisterView');
});

Route::get('/home', function () {
    return view('pages.HomeView');
});

Route::get('/newrecipe', function () {
    return view('pages.NewRecipeView');
});

Route::get('/ingredient', function () {
    return view('pages.IngredientView');
});

Route::get('/steps', function () {
    return view('pages.StepView');
});



//////////////////////////////////////////////////
//////////////////////////////////////////////////
Route::get('/ingredient/{recipe}', [IngredientController::class, 'ingredientView'])->name('ingredient.view');
Route::get('/ingredients/show', [IngredientController::class, 'show']);
Route::post('/recipes/store',  [RecipeController::class, 'store']);
Route::get('/home', [RecipeController::class, 'indexView'])->name('home');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/recipesxingredients', [RecipeXIngredientController::class, 'store'])->name('recipesxingredients.store');
Route::get('/step/{recipe}', [InstructionController::class, 'stepView'])->name('step.view');
Route::post('/instructions/store', [InstructionController::class, 'store'])->name('instructions.store');
Route::post('/favorites/store', [UserXRecipeController::class, 'store'])->name('favorites.store');
Route::get('/recipe/detail/{id}', [RecipeController::class, 'detail'])->name('recipe.detail');
Route::get('/favorites', [UserXRecipeController::class, 'showFavorites'])->name('favorites.view');
Route::get('/profile', [UserController::class, 'show'])->name('user.show');
Route::put('/profile/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/favorites/destroy/{recipe_id}', [UserXRecipeController::class, 'destroy'])->name('favorites.destroy');
Route::get('/emails', [UserController::class, 'showSendEmailForm'])->name('emails.view');
Route::post('/send-emails', [UserController::class, 'sendCustomEmails'])->name('emails.send');