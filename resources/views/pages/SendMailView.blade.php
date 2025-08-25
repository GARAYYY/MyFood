@section('content')
    <div style="max-width: 700px; margin: 2rem auto; font-family: 'Century Gothic', sans-serif; padding: 1rem;">
        <h1 style="text-align:center; margin-bottom: 2rem;">Enviar correos a usuarios</h1>
        @if(session('success'))
            <div style="background-color:#D4EDDA; color:#155724; padding:1rem; border-radius:6px; margin-bottom:1rem;">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('send.emails.post') }}" method="POST">
            @csrf
            <label for="subject" style="font-weight:bold;">Título:</label>
            <input type="text" name="subject" id="subject" required
                style="display:block; width:100%; padding:0.5rem; margin-bottom:1rem; border-radius:6px; border:1px solid #ccc;">
            <label for="content" style="font-weight:bold;">Contenido:</label>
            <textarea name="content" id="content" rows="6" required
                style="display:block; width:100%; padding:0.5rem; margin-bottom:1rem; border-radius:6px; border:1px solid #ccc;"></textarea>
            <button type="submit"
                style="background-color:#40798c; color:white; padding:0.7rem 1rem; border:none; border-radius:6px; cursor:pointer; font-weight:bold;">
                Enviar correos
            </button>
        </form>
    </div>
@endsection