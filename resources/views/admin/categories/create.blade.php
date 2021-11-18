@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.categories.store')}}" method="POST">
        @csrf
        {{-- Name --}}
        <div class="form-group">
            <label for="name">Nome della Categoria</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Inserisci il nome della categoria" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Crea Categoria</button>
    </form>
</div>
@endsection