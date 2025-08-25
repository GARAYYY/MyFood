@include('components.Header')

<div class="cards-container">
    @foreach ($recipes as $item)
        <a href="{{ url('/recipe/detail/' . $item->recipe_id) }}" class="recipe-link">
            @include('components.Recipe', ['recipe' => $item])
        </a>
    @endforeach
</div>

@include('components.Footer')

<style>
    .cards-container {
        margin-top: 1rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
        padding: 0 1rem;
    }

    .recipe-link {
        text-decoration: none;
        color: inherit;
        display: block;
        flex: 1 1 calc(33.333% - 1rem);
        max-width: calc(33.333% - 1rem);
    }

    @media (max-width: 480px) {
        .cards-container {
            flex-direction: column;
            gap: 1rem;
        }

        .cards-container>a {
            width: 100%;
        }

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
</style>