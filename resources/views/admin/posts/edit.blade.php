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
                @if ($errors->any())
                    <option {{old('category_id') == $category['id'] ? 'selected' : null}} value="{{$category['id']}}">{{$category['name']}}</option>
                @else
                    <option {{isset($post['category']) && $post['category']['id'] == $category['id'] ? 'selected' : null}} value="{{$category['id']}}">{{$category['name']}}</option>
                @endif
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
                    @if ($errors->any())
                        <input {{in_array($tag['id'], old('tags', [])) ? "checked" : null}} name="tags[]" value="{{$tag['id']}}" type="checkbox" class="custom-control-input" id="tag-{{$tag['id']}}">
                    @else
                        <input {{$post['tags']->contains($tag['id']) ? "checked" : null}} name="tags[]" value="{{$tag['id']}}" type="checkbox" class="custom-control-input" id="tag-{{$tag['id']}}">
                    @endif
                    <label for="tag-{{$tag['id']}}" class="custom-control-label">{{$tag->name}}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection

