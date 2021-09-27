
@extends('dashboard.master')

@section('content')

    <div class="form-group">
        <label for="title" class="form-label">Titulo</label>
        <input readonly type="text" class="form-control" name="title" id="title" placeholder="Titulo..." value="{{ $category->title }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="url_clean" class="form-label">URL Limpia</label>
        <input readonly type="text" class="form-control" name="url_clean" id="url_clean" placeholder="URL..." value="{{  $category->url_clean }}">
    </div>

@endsection