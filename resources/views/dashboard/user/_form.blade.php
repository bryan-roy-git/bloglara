

@csrf  <!-- Directiva de blade -->

<div class="form-group">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="name" id="name"  value="{{ old('name', $user->name) }}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="surname" id="surname"  value="{{ old('surname', $user->surname) }}">
    @error('surname')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email"  value="{{ old('email', $user->email) }}">
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

@if ($pasw)
    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" >
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

@endif


<input class="btn btn-primary" type="submit" value="Enviar">


