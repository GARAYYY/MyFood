<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyFood</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
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
            min-height: 400px;
        }

        .panel img {
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: auto;
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            margin-top: 4rem;
        }

        p {
            text-align: center;
            margin-bottom: 1rem;
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

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            margin-top: 1rem;
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
            text-align: center;
            text-decoration: none;
            font-size: 1rem;
            display: block;
        } 

        button:hover,
        .btn-link:hover {
            background: #305c6a;
        }

        @media (max-width: 480px) {
            .panel {
                padding: 1.5rem;
                border-radius: 8px;
                min-height: 380px;
            }

            .panel img {
                width: 90px;
                top: -45px;
            }

            h1 {
                font-size: 1.4rem;
            }

            input,
            button,
            .btn-link {
                font-size: 0.95rem;
                padding: 0.6rem;
            }
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="panel">
            <img src="{{ asset('images/logo.png') }}" alt="Food Icon">
            <h1>Inicia Sesi&oacute;n</h1>
            <p>Bienvenido a MyFood</p>
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <input type="email" name="email" placeholder="Correo electronico" required />
                <input type="password" name="password" placeholder="Contraseña" required />
                <div class="buttons">
                    <button type="submit">Entrar</button>
                    <a href="{{ url('/register') }}" class="btn-link">Reg&iacute;strate</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
