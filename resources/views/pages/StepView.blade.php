<!-- resources/views/pages/AddInstructions.blade.php -->

@include('components.Header')

<h1 class="form-title">Add Recipe Instructions</h1>

@php
    $recipeId = session('recipe_id'); // O el método que uses para guardar el ID de la receta
@endphp

<form action="{{ url('/instructions') }}" method="POST">
    @csrf
    <input type="hidden" name="recipe_id" value="{{ $recipeId }}">
    <div id="steps-container">
        <div class="step-row">
            <label class="step-label">Step 1</label>
            <textarea name="instructions[]" placeholder="Write the instruction for this step..." class="step-textarea"></textarea>
        </div>
    </div>

    <div class="buttons">
        <button type="button" id="add-step"><strong>Add Step</strong></button>
        <button type="submit"><strong>Save</strong></button>
    </div>
</form>

@include('components.Footer')

<script>
    let stepCount = 1;
    document.getElementById('add-step').addEventListener('click', function() {
        stepCount++;
        const container = document.getElementById('steps-container');
        const div = document.createElement('div');
        div.classList.add('step-row');
        div.innerHTML = `
            <label class="step-label">Step ${stepCount}</label>
            <textarea name="instructions[]" placeholder="Write the instruction for this step..." class="step-textarea"></textarea>
        `;
        container.appendChild(div);
    });
</script>

<style>
.form-title {
    text-align: center;
    margin: 2rem 0;
    font-size: 2rem;
    font-weight: bold;
}

.step-row {
    background: #E2F3E9;
    padding: 1rem;
    border-left: 2px solid black;
    border-right: 2px solid black;
    border-radius: 5px;
    margin-bottom: 1rem;
}

.step-label {
    font-weight: bold;
    display: block;
    margin-bottom: 0.5rem;
}

.step-textarea {
    width: 98%;
    min-height: 80px;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.buttons {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
    gap: 1rem;
}

button {
    padding: 0.8rem 2rem;
    background: #9CD3C2;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}
</style>
