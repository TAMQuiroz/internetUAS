<div id="{{$id}}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Precaución</h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 10px;">
                    <div class="form-group">
                      <div class="col-md-12 col-sm-12"></div>
                      <p>
                        La primera parte del flujo de coordinador está por concluir, se agregaron los siguientes elementos:
                      </p>
                      <br>
                      <p>- Nuevos Objetivos Educacionales creados</p>
                      <p>- Resultados Estudiantiles creados</p>
                      <p>- Aspectos creados</p>
                      <p>- Criterios creados</p>
                      <p>- Instrumentos creados</p>
                      <br>
                      <p>Usted ha terminado satisfactoriamente la primera parte del flujo. Se guardarán los cambios.
                      </p>
                      <br>
                      <p>Ahora se comenzará el segundo flujo que contienen 2 funcionalidades importantes para la acreditación de una especialidad. Las funcionalidades mencionadas son:
                      </p>
                      <br>
                      <p>- Profesores creados</p>
                      <p>- Cursos creados</p>
                      <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
                <a href="{{ $route }}">
                    {{ Form::button('Eliminar', ['class' => 'btn btn-danger'])}}
                </a>
            </div>
        </div>
    </div>
</div>