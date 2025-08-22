<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - MyFood</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .login {
            background-image: url('{{ asset('public/images/login.jpg') }}');
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
            width: 50%;
            max-width: 400px;
            background-color: #ffffff50;
            color: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 1);
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
        }

        p {
            text-align: center;
            margin-bottom: 1rem;
        }

        input {
            display: block;
            width: 100%;
            margin: 1rem 0;
            padding: 0.5rem;
            border-radius: 6px;
            border: none;
            background-color: rgba(255, 255, 255, 0.493);
        }

        button {
            width: 100%;
            padding: 0.7rem;
            border-radius: 6px;
            border: none;
            background: #40798c;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .panel {
                width: 90%;
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 0.9rem;
            }

            button {
                padding: 0.6rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 480px) {
            .panel {
                width: 100%;
                padding: 1rem;
                border-radius: 8px;
            }

            h1 {
                font-size: 1.3rem;
            }

            p {
                font-size: 0.85rem;
            }

            input {
                padding: 0.4rem;
                font-size: 0.9rem;
            }

            button {
                padding: 0.5rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="panel">
            <h1>Sign In</h1>
            <p>Welcome to MyFood</p>
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <div class="bottones">
                    <button type="submit">Login</button>
                    <a href="{{ url('/register') }}">
                        <button type="button">Register</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>