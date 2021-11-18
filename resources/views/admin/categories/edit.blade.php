@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.categories.update', $category["id"])}}" method="POST">
        @csrf
        @method("PUT")
        {{-- Name --}}
        <div class="form-group">
            <label for="name">Aggiorna la Categoria</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Inserisci il nome della categoria" value="{{old('name') ?? $category->name}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Aggiorna Categoria</button>
    </form>
</div>
@endsection