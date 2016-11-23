<div id="{{$id}}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $message }}</h4>
            </div>
            <div class="modal-body">
                <div class="row form-horizontal">
                    <div class="form-group">
                        {{Form::label('Codigo',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            <div class="form-control no-border">
                                {{$cita->id}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Tutor',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            <div class="form-control no-border">
                                {{$cita->teacher->Nombre}} {{$cita->teacher->ApellidoPaterno}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Fecha y hora',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            <div class="form-control no-border">
                                {{$cita->inicio}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Lugar',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            <div class="form-control no-border">
                                {{$cita->lugar}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Tema',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            <div class="form-control no-border">
                                {{$cita->topic->nombre}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Informacion extra',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            <div class="form-control no-border">
                                {{$cita->adicional}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('Observacion',null,['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])}}
                        <div class="col-xs-12 col-md-8">
                            <div class="form-control no-border">
                                {{$cita->observacion}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                {{ Form::button('Aceptar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
            </div>
        </div>
    </div>
</div>