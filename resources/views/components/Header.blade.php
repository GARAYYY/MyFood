<!-- resources/views/components/header.blade.php -->

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

<div class="header">
    <h1>MyFood</h1>
    <ul>
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/favorites') }}">My list</a></li>
        <li><a href="{{ url('/newrecipe') }}">Add receipt</a></li>
        <li><a href="{{ url('/profile') }}">Profile</a></li>
        <li><a href="{{ url('/') }}">Close session</a></li>
    </ul>
</div>

<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.header {
    background-color: #9CD3C2;
    padding: 1rem 0;
    border-bottom: 5px solid black;
    font-family: "Century Gothic", sans-serif;
}

.header h1 {
    text-align: center;
    font-family: 'Cinzel', serif;
}

.header ul {
    display: flex;
    list-style: none;
    justify-content: space-evenly;
    margin: 1rem 5rem;
    min-height: 40px;
    align-items: center;
}

.header li {
    display: flex;
    width: 100%;
    height: 100%;
    text-align: center;
}

.header a {
    display: block;
    width: 100%;
    height: 100%;
    color: black;
    text-decoration: none;
    padding: 1rem 0;
}

li:hover {
    background-color: #E2F3E9;
    box-shadow: 5px 5px 10px black;
}
</style>
