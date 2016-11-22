<div id="{{$id}}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Precaución</h4>
            </div>
            {{Form::open(['route' => ['mis_citas.delete', $tutMeeting->id], 'class'=>'form-horizontal'])}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>{{ $message }}</p>
                    </div>
                    @foreach($motivos as $motivo)
                    <div class="col-md-12">
                        {{Form::radio('razon', $motivo->id, false, ['class' => 'name'])}}
                        {{$motivo->nombre}}
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
                {{ Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>