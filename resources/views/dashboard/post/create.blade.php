<div class="container">

    <form action="{{ route('post.store') }}" method="POST">
        @csrf  <!-- Directiva de blade -->
       
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input type="email" class="form-control" id="title" placeholder="Titulo...">
        </div>

        <div class="mb-3">
            <label for="url_clean" class="form-label">URL Limpia</label>
            <input type="email" class="form-control" id="url_clean" placeholder="URL...">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="content" rows="3"></textarea>
        </div>

        <input type="submit" value="Enviar">
    </form>

    </div>