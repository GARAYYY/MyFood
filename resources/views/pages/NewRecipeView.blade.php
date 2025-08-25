@include('components.Header')

<h1 class="form-title">New Recipe</h1>

<form action="{{ url('/recipes/store') }}" method="POST" enctype="multipart/form-data" class="recipe-form">
    @csrf
    <div class="form-panel">
        <div class="form-section">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ old('description') }}" required>
            <label for="cooking_time">Time (mins)</label>
            <input type="number" name="cooking_time" id="cooking_time" value="{{ old('cooking_time') }}" required>
        </div>
        <div class="form-section">
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
        </div>
    </div>
    <div class="button-container">
        <input type="hidden" name="created_by" value="{{ auth()->id() ?? '' }}">
        <button type="submit">Next</button>
    </div>
</form>

@include('components.Footer')

<style>
    /* Reset y tipografía */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Century Gothic", sans-serif;
    }

    /* Form title */
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

    /* Panel de formulario */
    .recipe-form {
        display: flex;
        justify-content: center;
        padding: 1rem;
    }

    .form-panel {
        display: flex;
        gap: 2rem;
        background-color: #E2F3E9;
        padding: 2rem;
        border-radius: 8px;
        width: 60%;
        max-width: 800px;
        flex-wrap: wrap;
    }

    /* Secciones */
    .form-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    /* Labels e inputs */
    label {
        font-weight: bold;
    }

    input,
    button,
    select,
    textarea {
        padding: 0.6rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        /* evita zoom en móviles */
        font-family: "Century Gothic", sans-serif;
    }

    /* Radio buttons */
    .radio-group {
        display: flex;
        margin-top: 0.5rem;
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
        transition: all 0.2s ease;
    }

    .radio-box:not(:first-of-type) {
        margin-left: -1px;
    }

    .radio-box:first-of-type {
        border-radius: 6px 0 0 6px;
    }

    .radio-box:last-of-type {
        border-radius: 0 6px 6px 0;
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
    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 1.5rem;
        width: 60%;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    button {
        width: 100%;
        padding: 0.8rem;
        background-color: #9CD3C2;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Responsivo */
    @media (max-width:992px) {
        .form-panel {
            flex-direction: column;
            width: 80%;
            padding: 1.5rem;
        }

        .button-container {
            width: 80%;
        }
    }

    @media (max-width:600px) {
        .form-panel {
            width: 95%;
            padding: 1rem;
        }

        .button-container {
            width: 95%;
        }

        .form-title {
            width: 95%;
            font-size: 1.5rem;
        }

        .radio-group {
            flex-direction: column;
        }

        .radio-box {
            margin-left: 0 !important;
            margin-bottom: 0.5rem;
            border-radius: 6px;
        }
    }
</style>