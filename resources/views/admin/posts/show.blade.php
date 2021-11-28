@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$post->title}}</h1>
        {{-- @if ($post['category']) --}}
            <p>Categoria: {{!empty($post["category"]["name"]) ? $post["category"]["name"] : "Non esiste"}}</p>
        {{-- @endif --}}
        <p>{{$post->content}}</p>
        @if (count($post['tags']) > 0)
            <h3>Ecco i tags del post</h3>
            @foreach ($post['tags'] as $tag)
                <span class="badge badge-primary">{{$tag->name}}</span>
            @endforeach           
        @endif
    </div>
@endsection