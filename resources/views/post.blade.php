@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col col-md-8 offset-2">
        <h1 class="text-center">{{$post->name}}</h1>
        <div class="card">
            <div class="card-header">
                <a href="{{route('category',$post->category->slug)}}">{{$post->category->name}}</a>
            </div>
            <div class="card-body">
                @if ($post->file)
                <img src="{{$post->file}}" alt="imagen" class="card-img-top">
                @endif
                <div class="mt-3">{{$post->body}}</div>
                <div class="mt-3">{{$post->excerpt}}</div>
            </div>
            <div class="card-footer">
                @foreach ($post->tags as $item)
                <a href="{{route('slug',$item->slug)}}">{{$item->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
