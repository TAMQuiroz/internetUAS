<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-objs">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código </label>
          <div class="col-md-3 col-sm-3 col-xs-12" id="modal-objs-code">
          </div>
          </div>
        </div>
        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Número </label>
          <div class="col-md-3 col-sm-3 col-xs-12" id="modal-objs-numb">
          </div>
          </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="form-group">
            <div class="col-md-3 col-sm-3"></div>
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción </label>
            <div class="col-md-3 col-sm-3 col-xs-12" id="modal-objs-desc">
            </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
          <div class="form-group">
          <div class="col-md-3 col-sm-3"></div>
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ciclo de Registro</label>
          <div class="col-md-3 col-sm-3 col-xs-12" id="modal-objs-cycle">
          </div>
          </div>
        </div>
        <table class="table table-striped responsive-utilities jambo_table bulk_action" id="studentResult-table">
          <thead>
            <tr class="headings">
              <th class="column-title">Identificador </th>
              <th class="column-title">Descripción</th>
              <th class="column-title">Ciclo de Registro </th>
            </tr>
          </thead>
          <tbody id="studentResult-list">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="{{ route('edit.educationalObjectives') }}" class="btn btn-success" id="edit-button">Editar</a>
      </div>
    </div>
  </div>
</div>