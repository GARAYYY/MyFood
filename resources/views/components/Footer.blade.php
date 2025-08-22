<!-- resources/views/components/footer.blade.php -->

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

<div class="footer">
    <div class="links">
        <a href="{{ url('docs/Legal_Notice_and_Disclaimer.pdf') }}" target="_blank">
            Legal Notice and Disclaimer
        </a>
        <a href="{{ url('docs/Terms_of_Use_and_Conditions.pdf') }}" target="_blank">
            Terms of Use and Conditions
        </a>
    </div>
    <span class="version">V1.0</span>
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
