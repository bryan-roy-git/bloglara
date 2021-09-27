
@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<form action="{{ route('category.update',$category->id) }}" method="POST">
    @method('PUT') {{-- tipo de metodo que va a similar --}}
    @include('dashboard.category._form')
</form>

@endsection