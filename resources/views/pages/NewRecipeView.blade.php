@include('components.Header')

<h1 class="form-title">New Recipe</h1>

<form action="{{ url('/recipes/store') }}" method="POST" enctype="multipart/form-data" class="recipe-form">
    @csrf
    <div class="form-panel">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}" required>

        <label for="cooking_time">Time (mins)</label>
        <input type="number" name="cooking_time" id="cooking_time" value="{{ old('cooking_time') }}" required>

        <label for="servings">Servings</label>
        <input type="number" name="servings" id="servings" value="{{ old('servings') }}" required>

        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/*">

        <label>Difficulty</label>
        <div class="radio-group">
            <input type="radio" id="difficulty-easy" name="difficulty" value="easy" checked>
            <label for="difficulty-easy" class="radio-box">Easy</label>

            <input type="radio" id="difficulty-medium" name="difficulty" value="medium">
            <label for="difficulty-medium" class="radio-box">Medium</label>

            <input type="radio" id="difficulty-hard" name="difficulty" value="hard">
            <label for="difficulty-hard" class="radio-box">Hard</label>
        </div>

        <button type="submit">Next</button>
    </div>
</form>

@include('components.Footer')

<style>
    body {
        font-family: "Century Gothic", sans-serif;
    }

    .form-title {
        text-align: center;
        margin: 2rem auto;
        font-size: 2rem;
        font-weight: bold;
        background-color: #E2F3E9;
        width: 80%;
        max-width: 500px;
        padding: 1rem;
        border-radius: 8px;
    }

    .recipe-form {
        display: flex;
        justify-content: center;
        padding: 1rem;
    }

    .form-panel {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        background-color: #E2F3E9;
        padding: 2rem;
        border-radius: 8px;
        width: 60%;
        max-width: 600px;
    }

    /* Labels e inputs */
    label {
        font-weight: bold;
    }

    input,
    button {
        padding: 0.6rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        /* evita zoom en móviles */
        width: 100%;
        box-sizing: border-box;
    }

    /* Radio buttons */
    .radio-group {
        display: flex;
        margin: 0.5rem 0;
        flex-wrap: wrap;
    }

    .radio-group input[type="radio"] {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .radio-box {
        flex: 1;
        padding: 0.6rem;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
        user-select: none;
        background: #ffffff27;
        border: 1px solid #ccc;
        margin-right: -1px;
        margin-bottom: 0.3rem;
        border-radius: 5px;
        min-width: 80px;
    }

    #difficulty-easy:checked+label.radio-box {
        background: #408c4a65;
        border-color: #408c4a65;
    }

    #difficulty-medium:checked+label.radio-box {
        background: #818c4065;
        border-color: #818c4065;
    }

    #difficulty-hard:checked+label.radio-box {
        background: #8c404065;
        border-color: #8c404065;
    }

    /* Botón */
    button {
        margin-top: 1rem;
        background-color: #9CD3C2;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Responsivo */
    @media (max-width: 992px) {
        .form-panel {
            width: 80%;
        }
    }

    @media (max-width: 600px) {
        .form-panel {
            width: 95%;
            padding: 1rem;
        }

        .form-title {
            width: 95%;
            font-size: 1.5rem;
        }

        .radio-group {
            flex-direction: column;
        }

        .radio-box {
            margin-right: 0;
            margin-bottom: 0.5rem;
            border-radius: 6px;
        }
    }
</style>