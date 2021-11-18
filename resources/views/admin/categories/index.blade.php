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
                    <th scope="col">Visualizza</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        {{-- if issett postCategoryName ? postCategoryName : '' --}}
                        <td><a href="{{ route('admin.categories.show' , $category['id']) }}" class="btn btn-primary">Visualizza</a></td>
                        <td><a href="{{ route('admin.categories.edit' , $category['id']) }}" class="btn btn-warning">Modifica</a></td>
                        <td>
                            <form action="{{ route('admin.categories.destroy' , $category['id']) }}" method="POST">
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