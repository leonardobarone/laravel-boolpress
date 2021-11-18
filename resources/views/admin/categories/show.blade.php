@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$category->name}}</h1>
        <p>{{$category->slug}}</p>
        <h3>La lista dei posts associati a questa categoria</h3>
        <ul>
            @forelse ($category['posts'] as $post)
                <li>{{$post->title}}</li>
            @empty
                <h2>Non ci sono post associati!</h2>
            @endforelse
        </ul>
    </div>
@endsection