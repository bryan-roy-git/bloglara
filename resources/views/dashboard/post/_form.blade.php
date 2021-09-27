

@csrf  <!-- Directiva de blade -->

<div class="form-group">
    <label for="title" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo..." value="{{ old('title', $post->title) }}">
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="url_clean" class="form-label">URL Limpia</label>
    <input type="text" class="form-control" name="url_clean" id="url_clean" placeholder="URL..." value="{{ old('url_clean',$post->url_clean) }}">
</div>

<div class="form-group">
    <label for="content" class="form-label">Contenido</label>
    <textarea class="form-control" name="content" id="content" rows="3">{{ old('content',$post->content) }}</textarea>
</div>

<input type="submit" value="Enviar">

