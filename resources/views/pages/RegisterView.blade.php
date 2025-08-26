<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MyFood</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", sans-serif;
        }

        .login {
            background-image: url('{{ asset('images/login.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .panel {
            width: 100%;
            max-width: 420px;
            background-color: #ffffff50;
            color: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 1);
            position: relative;
            min-height: 500px;
        }

        .panel img {
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: auto;
        }

        h1,
        p {
            text-align: center;
        }

        h1 {
            margin-top: 4rem;
        }

        input {
            display: block;
            width: 100%;
            margin: 0.8rem 0;
            padding: 0.6rem;
            border-radius: 6px;
            border: none;
            background-color: rgba(255, 255, 255, 0.65);
            font-size: 1rem;
        }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin: 1rem 0;
            font-size: 0.9rem;
        }

        .terms a {
            color: #ccefff;
            text-decoration: underline;
        }

        button,
        .btn-link {
            width: 100%;
            padding: 0.7rem;
            border-radius: 6px;
            border: none;
            background: #40798c;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 0.8rem;
            text-decoration: none;
            text-align: center;
            display: block;
            font-size: 1rem;
        }

        button:hover,
        .btn-link:hover {
            background: #305c6a;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            margin: 1rem 0;
            border-radius: 8px;
            overflow: hidden;
        }

        .radio-group input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .radio-box {
            flex: 1;
            min-width: 100px;
            padding: 12px;
            text-align: center;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
            background: #ffffff27;
            border: 1px solid #ccc;
            transition: background-color .2s ease, color .2s ease, border-color .2s ease;
            align-content: center;
        }

        .radio-box:not(:first-of-type) {
            margin-left: -1px;
        }

        input[type="radio"]:checked+label.radio-box {
            background: #40798ca8;
            color: #fff;
            border-color: #40798c;
        }

        @media (max-width: 768px) {
            .panel {
                width: 90%;
                padding: 1.5rem;
            }

            .panel img {
                width: 100px;
                top: -50px;
            }

            .radio-box {
                flex: 1 1 50%;
            }
        }

        @media (max-width: 480px) {
            .panel {
                width: 100%;
                padding: 1rem;
                border-radius: 8px;
            }

            .panel img {
                width: 80px;
                top: -40px;
            }

            .radio-box {
                flex: 1 1 100%;
                margin: 2px 0 !important;
            }
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="panel">
            <img src="{{ asset('images/logo.png') }}" alt="Food Icon">
            <h1>Registro</h1>
            <p>Bienvenido a MyFood</p>
            @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de validación',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        confirmButtonText: 'Cerrar'
                    });
                </script>
            @endif
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required />
                <input type="email" name="email" placeholder="Correo electronico" value="{{ old('email') }}" required />
                <input type="password" name="password" placeholder="Contraseña" required />
                <div class="radio-group">
                    <input id="skill-beginner" type="radio" name="cooking_skill" value="Principiante" checked {{ old('cooking_skill') == 'Principiante' ? 'checked' : '' }}>
                    <label for="skill-beginner" class="radio-box">Principiante</label>
                    <input id="skill-intermediate" type="radio" name="cooking_skill" value="Intermedio" {{ old('cooking_skill') == 'Intermedio' ? 'checked' : '' }}>
                    <label for="skill-intermediate" class="radio-box">Intermedio</label>
                    <input id="skill-expert" type="radio" name="cooking_skill" value="Avanzado" {{ old('cooking_skill') == 'Avanzado' ? 'checked' : '' }}>
                    <label for="skill-expert" class="radio-box">Avanzado</label>
                </div>
                <div class="radio-group">
                    <input id="diet-none" type="radio" name="diet_type" value="Ninguna" checked>
                    <label for="diet-none" class="radio-box">Ninguna</label>
                    <input id="diet-vegetarian" type="radio" name="diet_type" value="Vegetariana">
                    <label for="diet-vegetarian" class="radio-box">Vegetariana</label>
                    <input id="diet-vegan" type="radio" name="diet_type" value="Vegana">
                    <label for="diet-vegan" class="radio-box">Vegana</label>
                    <input id="diet-lowcarb" type="radio" name="diet_type" value="Bajos carbohidratos">
                    <label for="diet-lowcarb" class="radio-box">Bajos Carbohidratos</label>
                    <input id="diet-other" type="radio" name="diet_type" value="Otra">
                    <label for="diet-other" class="radio-box">Otra</label>
                </div>
                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required />
                    <label for="terms">
                        Acepto el <a href="/docs/Aviso_Legal_y_Descargo_de_Responsabilidad.pdf" target="_blank">Aviso
                            Legal</a>
                        y los <a href="/docs/Terminos_y_Condiciones_de_Uso.pdf" target="_blank">Términos de Uso</a>
                    </label>
                </div>
                <button type="submit">Registrarse</button>
                <a href="{{ url('/') }}" class="btn-link">Volver</a>
            </form>
        </div>
    </div>
</body>

</html>