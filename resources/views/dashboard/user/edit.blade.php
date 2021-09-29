
@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<form action="{{ route('user.update',$user) }}" method="POST">
    @method('PUT') {{-- tipo de metodo que va a similar --}}
    @include('dashboard.user._form', ['pasw' => false])
</form>
<br>



@endsection