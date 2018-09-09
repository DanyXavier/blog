{!! Form::open(['route'=>['tags.update',''],'method'=>'PUT','id'=>'fomEdit']) !!}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edicion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::label('name', 'Nombre de la etiqueta') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'URL amigable') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug','readonly']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
            </div>
        </div>
    </div>
</div>
{!! Form::close()!!}

