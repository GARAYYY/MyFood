<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - MyFood</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

        h1, p {
            text-align: center;
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

        .terms {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .terms label {
            font-size: 0.9rem;
            cursor: pointer;
        }

        .terms a {
            color: #40798c;
            text-decoration: none;
        }

        .terms input{
            width: auto;
            margin-right: 0.5rem;
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

        /* Estados seleccionados */
        #skill-beginner:checked + label.radio-box,
        #skill-intermediate:checked + label.radio-box,
        #skill-expert:checked + label.radio-box,
        #diet-none:checked + label.radio-box,
        #diet-vegetarian:checked + label.radio-box,
        #diet-vegan:checked + label.radio-box,
        #diet-lowcarb:checked + label.radio-box {
            background: #40798c65;
            color: #fff;
            border-color: #40798c65;
        }
    </style>
</head>
<body>
<div class="login">
    <div class="panel">
        <h1>Register</h1>
        <p>Welcome to MyFood</p>

        {{-- Formulario --}}
        <form method="POST" action="{{ url('/api/register') }}">
            @csrf

            <input type="text" name="name" placeholder="Name" required/>
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="password" placeholder="Password" required/>

            {{-- Cooking skill --}}
            <div class="radio-group">
                <input id="skill-beginner" type="radio" name="cooking_skill" value="Beginner" checked>
                <label for="skill-beginner" class="radio-box">Beginner</label>

                <input id="skill-intermediate" type="radio" name="cooking_skill" value="Intermediate">
                <label for="skill-intermediate" class="radio-box">Intermediate</label>

                <input id="skill-expert" type="radio" name="cooking_skill" value="Expert">
                <label for="skill-expert" class="radio-box">Expert</label>
            </div>

            {{-- Diet type --}}
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

            {{-- Terms --}}
            <div class="terms">
                <input type="checkbox" id="terms" name="terms" required/>
                <label for="terms">
                    I agree to the <a href="/docs/Terms_of_Use_and_Conditions.pdf" target="_blank">Terms of Use</a>
                    and <a href="/docs/Legal_Notice_and_Disclaimer.pdf" target="_blank">Legal Notice</a>
                </label>
            </div>

            <button type="submit">Register</button>
            <a href="{{ url('/') }}"><button type="button">Login</button></a>
        </form>
    </div>
</div>
</body>
</html>
