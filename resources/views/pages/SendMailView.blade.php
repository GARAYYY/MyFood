@include('components.Header')

<div class="mail-form-container">
    <h1>Enviar correos a usuarios</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('send.emails.post') }}" method="POST">
        @csrf

        <label for="subject">Título:</label>
        <input type="text" name="subject" id="subject" required>

        <label for="content">Contenido:</label>
        <textarea name="content" id="content" rows="6" required></textarea>

        <button type="submit">Enviar correos</button>
    </form>
</div>

@include('components.Footer')

<style>
    .mail-form-container {
        max-width: 700px;
        margin: 2rem auto;
        font-family: 'Century Gothic', sans-serif;
        padding: 1rem;
        background: #E2F3E9;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .mail-form-container h1 {
        text-align: center;
        margin-bottom: 2rem;
        font-weight: bold;
    }

    .mail-form-container label {
        font-weight: bold;
        display: block;
        margin-bottom: 0.3rem;
        margin-top: 1rem;
    }

    .mail-form-container input,
    .mail-form-container textarea {
        display: block;
        width: 100%;
        padding: 0.5rem;
        margin-bottom: 1rem;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-family: 'Century Gothic', sans-serif;
    }

    .mail-form-container button {
        display: block;
        width: 100%;
        padding: 0.7rem 1rem;
        border-radius: 6px;
        border: none;
        background: #40798c;
        color: white;
        font-weight: bold;
        cursor: pointer;
        margin-top: 1rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .mail-form-container button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    .success-message {
        background-color: #D4EDDA;
        color: #155724;
        padding: 1rem;
        border-radius: 6px;
        margin-bottom: 1rem;
        text-align: center;
    }
</style>