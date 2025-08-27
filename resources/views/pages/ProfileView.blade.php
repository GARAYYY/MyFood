@include('components.Header')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $recipes = $user->recipes ?? collect();
@endphp

<div class="profile-container">
    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar perfil',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonText: 'Cerrar'
            });
        </script>
    @endif
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
    <div class="user-info">
        <div class="user-header">
            <div class="avatar">
                {{ $user->name ? strtoupper(substr($user->name, 0, 1)) : 'U' }}
            </div>
            <div>
                <h2>{{ $user->name }}</h2>
                <p class="email">{{ $user->email }}</p>
            </div>
        </div>
        <form action="{{ route('user.update') }}" method="POST" class="user-details">
            @csrf
            @method('PUT')
            <p>
                <strong>Nombre:</strong>
                <input name="name" type="text" value="{{ old('name', $user->name) }}" required>
            </p>
            <p>
                <strong>Correo electr&oacute;nico:</strong>
                <input name="email" type="email" value="{{ old('email', $user->email) }}" required>
            </p>
            <p>
                <strong>Contrase&ntilde;a:</strong>
                <input name="password" type="password" placeholder="Leave blank to keep current">
            </p>
            <p>
                <strong>Confirmar contrase&ntilde;a:</strong>
                <input name="password_confirmation" type="password" placeholder="Confirm password">
            </p>
            <p>
                <strong>Nivel de cocina:</strong>
                <select name="cooking_skill" required>
                    <option disabled value="">Elige un nivel</option>
                    <option value="Principiante" {{ $user->cooking_skill == 'Principiante' ? 'selected' : '' }}>
                        Principiante
                    </option>
                    <option value="Intermedio" {{ $user->cooking_skill == 'Intermedio' ? 'selected' : '' }}>
                        Intermedio</option>
                    <option value="Avanzado" {{ $user->cooking_skill == 'Avanzado' ? 'selected' : '' }}>Avanzado</option>
                </select>
            </p>
            <p>
                <strong>Tipo de dieta:</strong>
                <select name="diet_type" required>
                    <option disabled value="">Elige una dieta</option>
                    @foreach(['Ninguna', 'Vegana', 'Vegetariana', 'Bajos carbohidratos', 'Otra'] as $diet)
                        <option value="{{ $diet }}" {{ $user->diet_type == $diet ? 'selected' : '' }}>{{ $diet }}</option>
                    @endforeach
                </select>
            </p>
            <button type="submit" class="save-btn">Guardar cambios</button>
        </form>
    </div>

    <div class="user-recipes">
        <h2>Mis Recetas</h2>
        @if($recipes->isEmpty())
            <p class="empty-msg">No has creado ninguna receta a&uacute;n</p>
        @else
            <div class="recipes-list">
                @foreach($recipes as $recipe)
                    <a href="{{ route('recipe.detail', ['id' => $recipe->recipe_id]) }}">
                        @include('components.Recipe', ['recipe' => $recipe])
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>

@include('components.Footer')

<style>
    .profile-container {
        display: flex;
        gap: 2rem;
        padding: 2rem;
    }

    .user-info {
        flex: 1;
        max-width: 350px;
        background: #ffffffcc;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    }

    .user-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #40798c;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1.5rem;
    }

    .user-info h2 {
        margin: 0;
        font-size: 1.5rem;
        color: #333;
    }

    .email {
        font-size: 0.9rem;
        color: #555;
    }

    .user-details p {
        margin: 0.8rem 0;
    }

    .user-details input,
    .user-details select {
        width: 100%;
        padding: 0.3rem 0.5rem;
        margin-top: 0.2rem;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .save-btn {
        margin-top: 1rem;
        padding: 0.5rem 1rem;
        background: #40798c;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .save-btn:hover {
        background: #2c5a6c;
    }

    .user-recipes {
        flex: 3;
    }

    .user-recipes a {
        text-decoration: none;
        color: inherit;
    }

    .user-recipes h2 {
        margin-bottom: 1rem;
    }

    .recipes-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 5rem;
    }

    .empty-msg {
        font-style: italic;
        color: #666;
    }
</style>