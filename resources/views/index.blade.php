@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col col-md-8 offset-2 mt-2">
        @foreach ($posts as $item)
        <div class="card mt-2">
            <div class="card-header">{{$item->name}}</div>
            <div class="card-body">
                @if ($item->file)
                <img src="{{$item->file}}" alt="" class="card-img-top">
                @endif
                <div class="text-justify">
                    {{$item->excerpt}}
                </div>
                <div class="card-block">
                    <a href="{{route('post',$item->slug)}}" class="btn btn-info float-right text-white">Leer mas...</a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="mt-3">
            {{$posts->render()}}
        </div>
    </div>
</div>
@endsection

