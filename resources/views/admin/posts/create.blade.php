@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        {{-- TITLE --}}
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Inserisci il titolo" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- CONTENT --}}
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea cols="30" rows="10" class="form-control" name="content" id="content" placeholder="Inserisci un contenuto" class="@error('title') is-invalid @enderror">{{old('content')}}</textarea>
            @error('content')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- LA CATEGORIA --}}
        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category">
                <option value="">-- Seleziona Categoria --</option>
                @foreach ($categories as $category)
                <option {{ old('category_id') == $category['id'] ? 'selected' : null}} value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- TAGS --}}
        <div class="form-group">
            @foreach ($tags as $tag)
                <div class="custom-control custom-checkbox">
                    <input name="tags[]" value="{{$tag['id']}}" type="checkbox" class="custom-control-input" id="tag-{{$tag['id']}}">
                    <label for="tag-{{$tag['id']}}" class="custom-control-label">{{$tag->name}}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Crea Post</button>
    </form>
</div>
@endsection