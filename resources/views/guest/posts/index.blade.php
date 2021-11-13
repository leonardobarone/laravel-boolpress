@extends('layouts.guest')

@section('guestContent')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">

        <!-- Example row of columns -->
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 my-3">
                    <h2>{{$post->title}}</h2>
                    <p>{{$post->content}}</p>
                    {{-- ->format('d/m/Y') --}}
                    <em>{{$post->created_at->diffForHumans()}}</em>
                    <p class="mt-2"><a class="btn btn-secondary" href="{{ route('guest.posts.show', $post['slug']) }}" role="button"> Vai al post!!</a></p>
                </div>                    
            @endforeach
        </div>
        
    </div> <!-- /container -->    
@endsection
   
