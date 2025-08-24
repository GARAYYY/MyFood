<!-- resources/views/components/recipe.blade.php -->

<div class="card">
    @php
        $user = auth()->user();
        $isFavorite = false;

        if ($user) {
            $isFavorite = \App\Models\UserXRecipe::where('user_id', $user->user_id)
                ->where('recipe_id', $recipe->recipe_id)
                ->exists();
        }
    @endphp
    @if(!empty($recipe->image_url))
        <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="card-img" />
    @endif
    <div class="card-body">
        <h2 class="card-title">{{ $recipe->title }}</h2>
        <p class="card-description">{{ $recipe->description }}</p>
        <div class="card-info">
            <span><strong>Time:</strong> {{ $recipe->cooking_time }} min</span>
            <span><strong>Difficulty:</strong> {{ $recipe->difficulty }}</span>
            <span><strong>Servings:</strong> {{ $recipe->servings }}</span>
        </div>
        <small class="card-date">
            Created: {{ \Carbon\Carbon::parse($recipe->created_at)->format('d/m/Y') }}
            @if(auth()->check() && !$isFavorite)
                <form action="{{ route('favorites.store') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="recipe_id" value="{{ $recipe->recipe_id }}">
                    <button type="submit" class="favorite-btn">
                        <img src="{{ asset('images/favourites.png') }}" alt="Add to Favorites" class="favorite-icon">
                    </button>
                </form>
            @endif
        </small>
    </div>
</div>

<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        background: #E2F3E9;
        width: 350px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        font-family: "Century Gothic", sans-serif;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    .card-img {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }

    .card-body {
        padding: 1rem;
        background-color: #E2F3E9;
    }

    .card-title {
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
    }

    .card-description {
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .card-info {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
        font-size: 0.9rem;
        color: #555;
    }

    .card-date {
        display: flex;
        margin-top: 0.8rem;
        font-size: 0.8rem;
        color: #777;
        justify-content: space-between;
    }

    .favorite-btn {
        background: transparent;
        border: none;
        color: red;
        font-size: 1rem;
        cursor: pointer;
        margin-left: 10px;
    }
</style>