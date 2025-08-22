<!-- resources/views/pages/NewRecipe.blade.php -->

@include('components.Header')

<h1 class="form-title">New Recipe</h1>

<form action="{{ url('/recipes/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form">
        <div class="left">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ old('description') }}" required>
            
            <label for="cooking_time">Time (mins)</label>
            <input type="number" name="cooking_time" id="cooking_time" value="{{ old('cooking_time') }}" required>
        </div>

        <div class="right">
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
        <button type="submit"><strong>Next</strong></button>
    </div>
</form>

@include('components.Footer')

<style>
/* Copia aquí todo tu CSS del componente Vue, ajustando selectores si es necesario */
.form-title {
    font-family: "Century Gothic", sans-serif;
    text-align: center;
    margin-top: 1rem;
    font-size: 2rem;
    font-weight: bold;
    background-color: #E2F3E9;
    width: 63.4%;
    margin: 5rem auto 0 auto;
}

.form {
    font-family: "Century Gothic", sans-serif;
    display: flex;
    justify-content: space-between;
    width: 60%;
    margin: 0 auto;
    gap: 2rem;
    background-color: #E2F3E9;
    padding-bottom: 2rem;
    padding: 2rem;
}

.left,
.right {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

label {
    font-weight: bold;
}

input,
button {
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-family: "Century Gothic", sans-serif;
}

.button-container {
    display: flex;
    justify-content: center;
    width: 60%;
    margin: 0 auto;
    gap: 2rem;
    background-color: #E2F3E9;
    padding-bottom: 2rem;
    padding: 2rem;
}

button {
    padding: 1rem 0;
    width: 60%;
    background-color: #9CD3C2;
    cursor: pointer;
    font-family: "Century Gothic", sans-serif;
}

.radio-group {
    display: flex;
    margin: 1rem 0;
}

.radio-group input[type="radio"] {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

.radio-box {
    flex: 1;
    padding: 15px;
    text-align: center;
    font-weight: 700;
    cursor: pointer;
    user-select: none;
    background: #ffffff27;
    border: 1px solid #ccc;
    transition: background-color .2s ease, color .2s ease, border-color .2s ease;
}

.radio-box:not(:first-of-type) {
    margin-left: -1px;
}

.radio-box:first-of-type {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.radio-box:last-of-type {
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
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
</style>
