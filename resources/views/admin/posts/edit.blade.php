@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.posts.update', $post['id'])}}" method="POST">
        @csrf
        @method('PUT')
        {{-- TITLE --}}
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $post->title}}" placeholder="Inserisci il titolo">
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- CONTENT --}}
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea cols="30" rows="10" class="form-control" name="content" id="content" placeholder="Inserisci un contenuto">{{ old('content') ?? $post->content}}</textarea>
            @error('content')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- LA CATEGORIA --}}
        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" name="category_id" id="category">
                <option value="">-- Seleziona Categoria --</option>
                @foreach ($categories as $category)
                <option {{old('category_id') != null && old('category_id') == $category['id'] || isset($post['category']) && $post['category']['id'] == $category['id'] ? 'selected' : null}} value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection

