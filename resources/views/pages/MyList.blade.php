@include('components.Header')

<div class="cards-container">
    @if($recipes->isEmpty())
        <p>No tienes recetas en favoritos todavía.</p>
    @else
        @foreach($recipes as $recipe)
            <a href="{{ route('recipe.detail', ['id' => $recipe->recipe_id]) }}" class="recipe-link">
                @include('components.Recipe', ['recipe' => $recipe])
            </a>
        @endforeach
    @endif
</div>

@include('components.Footer')

<style>
    .cards-container {
        margin-top: 1rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
        padding: 0 3rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .recipe-link {
        text-decoration: none;
        color: inherit;
        display: block;
        flex: 1 1 calc(33.333% - 1rem);
        max-width: calc(33.333% - 1rem);
    }

    @media (max-width: 992px) {
        .recipe-link {
            flex: 1 1 calc(50% - 1rem);
            max-width: calc(50% - 1rem);
        }
    }

    @media (max-width: 600px) {
        .recipe-link {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }

    .floating-add {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #70A9A1;
        border: none;
        cursor: pointer;
        z-index: 999;
        border-radius: 100%;
    }

    .floating-add img {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    .floating-add:hover {
        transform: translateY(-3px) translateX(-3px);
        border-bottom: 2px solid black;
        border-right: 2px solid black;
    }

    .recipe-link {
        text-decoration: none;
        color: inherit;
        width: fit-content;
    }
</style>