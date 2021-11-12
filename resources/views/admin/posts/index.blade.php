@extends('layouts.app')

{{-- @dd($posts); --}}

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a href="{{ route('admin.posts.show' , $post['id']) }}" class="btn btn-primary">Visualizza</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection