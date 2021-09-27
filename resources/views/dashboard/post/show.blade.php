
@extends('dashboard.master')

@section('content')
       
    <div class="form-group">
        <label for="title" class="form-label">Titulo</label>
        <input readonly type="text" class="form-control" name="title" id="title" placeholder="Titulo..." value="{{ $post->title }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="url_clean" class="form-label">URL Limpia</label>
        <input readonly type="text" class="form-control" name="url_clean" id="url_clean" placeholder="URL..." value="{{  $post->url_clean }}">
    </div>

    <div class="form-group">
        <label for="content" class="form-label">Contenido</label>
        <textarea readonly class="form-control" name="content" id="content" rows="3">{{  $post->content }}</textarea>
    </div>

@endsection