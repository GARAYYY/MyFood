<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

<div class="footer">
    <div class="links">
        <a href="{{ url('/docs/Aviso_Legal_y_Descargo_de_Responsabilidad.pdf') }}" target="_blank">
            Aviso Legal
        </a>
        <a href="{{ url('/docs/Terminos_y_Condiciones_de_Uso.pdf') }}" target="_blank">
            T&eacute;rminos de Uso
        </a>
        <span> | support@myfood.click | <a href="https://myfood.click/">https://myfood.click/</a></span>
    </div>
    <span class="version">V1.4</span>
</div>

<style>
.footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #9CD3C2;
    border-top: 5px solid black;
    font-family: "Century Gothic", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: .8rem 0;
    font-size: 0.85rem;
    z-index: 999;
}

.links {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 2rem;
}

.footer a {
    color: black;
    text-decoration: none;
    white-space: nowrap;
}

.footer a:hover {
    text-decoration: underline;
}

.version {
    position: absolute;
    right: 1rem;
    font-weight: bold;
    color: black;
    white-space: nowrap;
}
</style>
