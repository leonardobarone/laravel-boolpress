@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))    
    <div class="container">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Visualizza</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    {{-- if issett postCategoryName ? postCategoryName : '' --}}
                    <td>{{$post['category']['name'] ?? ""}}</td>
                    <td>
                        @if (count($post['tags']) > 0)
                            @foreach ($post['tags'] as $tag)
                                <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach           
                        @endif
                    </td>
                    <td><a href="{{ route('admin.posts.show' , $post['id']) }}" class="btn btn-primary">Visualizza</a></td>
                    <td><a href="{{ route('admin.posts.edit' , $post['id']) }}" class="btn btn-warning">Modifica</a></td>
                    <td>
                        <form action="{{ route('admin.posts.destroy' , $post['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Elimina">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection