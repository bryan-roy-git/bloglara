
@extends('dashboard.master')

@section('content')
       
    <div class="form-group">
        <label for="title" class="form-label">Nombre</label>
        <input readonly type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $user->name }}">
    </div>

    <div class="form-group">
        <label for="surname" class="form-label">Apellido</label>
        <input readonly type="text" class="form-control" name="surname" id="surname" placeholder="" value="{{ $user->surname }}">
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input readonly type="email" class="form-control" name="email" id="email" placeholder="" value="{{  $user->email }}">
    </div>

    <div class="form-group">
        <label for="rol" class="form-label">Rol</label>
        <input readonly type="text" class="form-control" name="rol" id="rol" placeholder="" value="{{  $user->rol->name }}">
    </div>


@endsection