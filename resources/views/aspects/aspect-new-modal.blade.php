<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="aspect-new">
  <div class="modal-dialog modal-lg">

    <form method="POST" action="{{ route('save.aspects') }}" id="formModalAspectNew" novalidate="true" name="formModalAspectNew" class="form-horizontal form-label-left">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="gridSystemModalLabel">{{ $title }} </h4>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-horizontal">
                <div class="form-group">

                  <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="studentsResult_new_code" class="form-control col-md-7 col-xs-12" type="text" name="studentsResult_new_code" >
                        <option value="">-- Seleccione --</option>
                        @foreach($studentsResults as $stdRslt)
                          <option value="{{$stdRslt->IdResultadoEstudiantil}}">
                            {{ $stdRslt->Identificador }} - {{ $stdRslt->Descripcion }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row" style="margin-top: 10px;">
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del Aspecto<span class="error">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="aspect_new_name" name="aspect_new_name" required="true" class="form-control col-md-7 col-xs-12" type="text"  >
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <a class="btn btn-default" data-dismiss="modal" id="btn-close-new">Cancelar</a>
          <button class="btn btn-success submit" type="submit" id="btn-save-new">Guardar</button>
        </div>

      </div>
    </form>

  </div>
</div>

<script src="{{ URL::asset('js/myvalidations/aspect.js')}}"></script>
