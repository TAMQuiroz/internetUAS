<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="criteria-edit">
  <div class="modal-dialog modal-lg">

    <form method="POST" action="{{ route('update.criteria') }}" id="formModalCriteriaEdit" novalidate="true" name="formModalCriteriaEdit" class="form-horizontal form-label-left">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <input name="aspect-code" class="form-control col-md-7 col-xs-12" value="{{$aspect->IdAspecto}}" type="hidden"  />
              <input id="criteria_edit_code" name="criteria_edit_code" class="form-control col-md-7 col-xs-12" type="hidden"  />

              <div class="row" style="margin-top: 10px;">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre<span></span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control col-md-8 col-xs-12" id="criteria_edit_name" name="criteria_edit_name" rows="3" cols="300" style="resize: vertical;"></textarea>
                  </div>
                </div>
              </div>

            </div>
          </div>      		
        </div>

        <div class="modal-footer">
          <a class="btn btn-default" data-dismiss="modal" id="btn-close-edit">Cancelar</a>
          <button class="btn btn-success submit" type="submit" id="btn-save-edit">Guardar</button>
        </div>

    </div>
  </form>
</div>
</div>

<script src="{{ URL::asset('js/myvalidations/criteria.js')}}"></script>

