@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            {{-- TITLE --}}
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci il titolo">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            {{-- CONTENT --}}
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea cols="30" rows="10" class="form-control" name="content" id="content" placeholder="Inserisci un contenuto"></textarea>
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crea Post</button>
        </form>
    </div>
@endsection