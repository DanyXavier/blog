@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col col-md-8 offset-2">
        <div class="card">
            <div class="bg-white text-dark">
                <div class="card-header">
                    Lista de etiquetas
                    <a href="" class="btn btn-sm btn-primary float-right">
                        <i class="far fa-pencil-alt mr-1"></i>
                        Crear
                    </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <a class="btn btn-info btn-sm mr-2 text-white" href="{{route('tags.show',$item->id)}}">
                                            <i class="fal fa-eye"></i>
                                            Ver
                                        </a>
                                        <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-slug="{{ $item->slug }}" data-target="#editModal"
                                            name="prueba">
                                            <i class="fal fa-edit mr-1"></i>
                                            Editar
                                        </button>
                                        {!! Form::open(['route'=>['tags.destroy',$item->id],'method'=>'DELETE']) !!}
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fal fa-trash-alt mr-1"></i>
                                            Eliminar
                                        </button>
                                        {!! Form::close() !!}

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">
            {{$tags->render()}}
        </div>
        @include('auth.admin.tags.edit')
    </div>
</div>
@endsection
