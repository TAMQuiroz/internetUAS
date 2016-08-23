<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Elige un Curso</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form class="form-horizontal form-label-left">               
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Curso<span></span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="course-name" class="form-control col-md-7 col-xs-12" type="text" name="course-name" >
                    <option value="">--Seleccione--</option>
                    @foreach($courses as $res)
                    <option value="{{ $res->IdCurso }}"> {{ $res->Nombre }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Close</a>
        <a href="" class="btn btn-success" id="save-button">Save</a>
      </div>
    </div>
  </div>
</div>
