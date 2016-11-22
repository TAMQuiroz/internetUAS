<div id="{{$id}}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Rechazar Cita</h4>
            </div>
            <div class="modal-body">
                <p>{{ $message }}</p>
            </div>
            <div class="modal-footer">
                {{ Form::button('No', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
                <a href="{{ $route }}">
                    {{ Form::button('Si', ['class' => 'btn btn-danger'])}}
                </a>
            </div>
        </div>
    </div>
</div>