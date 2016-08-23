<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="source-edit">
  <div class="modal-dialog modal-lg">

 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="gridSystemModalLabel">{{ $title }}</h4>
      </div>
      
      <form action="{{ route('update.measurementSource') }}" method="POST" id="formModalSourceEditName" novalidate="true" name="formModalSourceEditName"  class="form-horizontal form-label-left">
        <div class="modal-body">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-horizontal">
              <div class="form-group">

                <div class="row" style="margin-top: 10px;">
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre<span></span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="code" name="code" class="form-control col-md-7 col-xs-12" type="hidden"  >
                        <input id="source_edit_name" name="source_edit_name" class="form-control col-md-7 col-xs-12" type="text"  >
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal" id="btn-close-edit">Cancelar</a>
        <button class="btn btn-success submit pull-right" type="submit" id="btn-save-edit">Guardar</button>
      </div>
       </form>
    </div>

   
  </div>
</div>

<script src="{{ URL::asset('js/myvalidations/measurementSource.js')}}"></script>
