@extends('main')

@section('title', '| Create New Post')

@section('content')
    <div class="row">
        <div class="col-md-8 cok-md-offset-2">
            <h1>{{$post->title}}</h1>
            <br>
            <h1>{{$post->body}}</h1>
        </div>
    </div>
@endsection
