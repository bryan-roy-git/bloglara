

@csrf  <!-- Directiva de blade -->

<div class="form-group">
    <label for="title" class="form-label">Titulo</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo..." value="{{ old('title', $category->title) }}">
    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="url_clean" class="form-label">URL Limpia</label>
    <input type="text" class="form-control" name="url_clean" id="url_clean" placeholder="URL..." value="{{ old('url_clean',$category->url_clean) }}">
</div>

<input type="submit" value="Enviar">

