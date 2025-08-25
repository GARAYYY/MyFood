@include('components.Header')

<h1 class="form-title">Select Ingredients</h1>

@php
    $ingredients = \App\Models\Ingredient::all();
    $recipeId = session('recipe_id');
@endphp

<form action="{{ url('/recipesxingredients') }}" method="POST">
    @csrf
    <input type="hidden" name="recipe_id" value="{{ $recipeId }}">
    <div class="form">
        <div class="ingredients-section">
            @foreach ($ingredients as $ingredient)
                <div class="ingredient-row">
                    <input type="checkbox" id="ingredient-{{ $ingredient->ingredient_id }}" name="ingredient_ids[]"
                        value="{{ $ingredient->ingredient_id }}">
                    <label for="ingredient-{{ $ingredient->ingredient_id }}" class="ingredient-label">
                        {{ $ingredient->name }}
                    </label>
                    <input type="number" name="quantities[{{ $ingredient->ingredient_id }}]" placeholder="Quantity"
                        class="quantity-input"> gr/ud
                </div>
            @endforeach
        </div>
    </div>
    <div class="button-container">
        <button type="submit"><strong>Next</strong></button>
    </div>
</form>

@include('components.Footer')

<style>
.form-title {
    text-align: center;
    margin: 2rem 0;
    font-size: 2rem;
    font-weight: bold;
    font-family: "Century Gothic", sans-serif;
}

.form {
    display: flex;
    justify-content: center;
    width: 70%;
    margin: 0 auto;
    background: #E2F3E9;
    padding: 2rem;
    border-radius: 10px;
}

.ingredients-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem 2rem;
    width: 100%;
}

.ingredient-row {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    background: #E2F3E9;
    padding: 0.8rem;
    border-left: 2px solid black;
    border-right: 2px solid black;
    flex-wrap: wrap;
}

.ingredient-label {
    flex: 1;
    font-weight: 500;
}

.quantity-input {
    width: 80px;
    padding: 0.3rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

.button-container {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

button {
    padding: 0.8rem 2rem;
    margin-bottom: 3rem;
    background: #9CD3C2;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}

@media (max-width: 992px) {
    .form {
        width: 90%;
        padding: 1.5rem;
    }

    .ingredients-section {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .ingredient-row {
        flex-direction: column;
        align-items: flex-start;
    }

    .quantity-input {
        width: 100%;
    }
}

@media (max-width: 600px) {
    .form {
        width: 95%;
        padding: 1rem;
    }

    .ingredient-row {
        gap: 0.5rem;
    }

    .button-container button {
        width: 100%;
        padding: 1rem;
    }
}
</style>
