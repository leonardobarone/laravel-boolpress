@extends('layouts.guest')
@section('guestContent')
    <div class="container">
        <h1>{{$post['title']}} (N° {{$post['id']}})</h1>
        <p>{{$post['content']}}</p>
    </div>
@endsection