<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- 🔥 Hace la página responsiva -->
    <title>Register - MyFood</title>
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
        }

        .radio-box:not(:first-of-type) {
            margin-left: -1px;
        }

        input[type="radio"]:checked+label.radio-box {
            background: #40798c85;
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
            <h1>Register</h1>
            <p>Welcome to MyFood</p>
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <input type="text" name="name" placeholder="Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <div class="radio-group">
                    <input id="skill-beginner" type="radio" name="cooking_skill" value="Beginner" checked>
                    <label for="skill-beginner" class="radio-box">Beginner</label>
                    <input id="skill-intermediate" type="radio" name="cooking_skill" value="Intermediate">
                    <label for="skill-intermediate" class="radio-box">Intermediate</label>
                    <input id="skill-expert" type="radio" name="cooking_skill" value="Expert">
                    <label for="skill-expert" class="radio-box">Expert</label>
                </div>
                <div class="radio-group">
                    <input id="diet-none" type="radio" name="diet_type" value="None" checked>
                    <label for="diet-none" class="radio-box">None</label>
                    <input id="diet-vegetarian" type="radio" name="diet_type" value="Vegetarian">
                    <label for="diet-vegetarian" class="radio-box">Vegetarian</label>
                    <input id="diet-vegan" type="radio" name="diet_type" value="Vegan">
                    <label for="diet-vegan" class="radio-box">Vegan</label>
                    <input id="diet-lowcarb" type="radio" name="diet_type" value="LowCarb">
                    <label for="diet-lowcarb" class="radio-box">LowCarb</label>
                </div>
                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required />
                    <label for="terms">
                        I agree to the <a href="/docs/Terms_of_Use_and_Conditions.pdf" target="_blank">Terms of Use</a>
                        and <a href="/docs/Legal_Notice_and_Disclaimer.pdf" target="_blank">Legal Notice</a>
                    </label>
                </div>
                <button type="submit">Register</button>
                <a href="{{ url('/') }}" class="btn-link">Login</a>
            </form>
        </div>
    </div>
</body>

</html>
