<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $recipe->title }} - MyFood</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .recipe-detail {
            font-family: "Century Gothic", sans-serif;
            padding: 2rem 3rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .recipe-header {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .recipe-image {
            width: 350px;
            height: 250px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        }

        .recipe-main-info {
            align-self: center;
        }

        .recipe-main-info h1 {
            margin: 0 0 0.5rem;
            font-size: 2rem;
            color: black;
        }

        .description {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            color: #444;
        }

        .meta span {
            width: 100%;
        }

        .author-card {
            background: #f7f9fa;
            border-left: 4px solid black;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }

        .author-card p {
            padding: .3rem 0;
        }

        .ingredients,
        .instructions {
            margin-top: 2rem;
            border-left: 4px solid black;
            border-radius: 8px;
            padding: 1rem;
            background: #f7f9fa;
        }

        .instructions {
            margin-bottom: 2rem;
        }

        .ingredients p,
        .instructions p {
            padding: .3rem 0;
            margin: 0;
            color: #333;
        }
    </style>
</head>

<body>
    @include('components.Header')
    <div class="recipe-detail">
        <div class="recipe-header">
            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="recipe-image" />
            <div class="recipe-main-info">
                <h1>{{ $recipe->title }}</h1>
                <p class="description">{{ $recipe->description }}</p>
                <div class="meta">
                    <span><strong>Difficulty:</strong> {{ $recipe->difficulty }}</span>
                    <span><strong>Cooking Time:</strong> {{ $recipe->cooking_time }} mins</span>
                    <span><strong>Servings:</strong> {{ $recipe->servings }}</span>
                </div>
            </div>
        </div>
        <div class="author-card">
            <h3>Author</h3>
            <p><strong>Name:</strong> {{ $recipe->author->name }}</p>
            <p><strong>Cooking Skill:</strong> {{ $recipe->author->cooking_skill }}</p>
            <p><strong>Diet Type:</strong> {{ $recipe->author->diet_type }}</p>
        </div>
        <div class="ingredients">
            <h3>Ingredients</h3>
            <div>
                @foreach($recipe->ingredients as $ingredient)
                    <p>{{ $ingredient->pivot->quantity }} gr/ud × {{ $ingredient->name }}</p>
                @endforeach
            </div>
        </div>
        <div class="instructions">
            <h3>Instructions</h3>
            <div>
                @foreach($recipe->instructions as $step)
                    <p><strong>{{ $step->step_number }}.</strong> {{ $step->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
    @include('components.Footer')
</body>

</html>