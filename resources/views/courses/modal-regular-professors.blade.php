<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"  id="modal-regular-professor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Buscar Profesor</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-search-professor" action="{{ url('teachers/search') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="course_id" value="{{ $course->IdCurso or '0' }}">
                    <div class="row" style="margin-top: 10px;">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="professor_name" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="professor_code" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="faculty_id" class="form-control" required="required">
                                    <option value="0">-- Seleccione --</option>
                                    @foreach( $faculties as $fac)
                                        <option value="{{$fac->IdEspecialidad}}">{{$fac->Nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                        <div class="btn btn-success" id="search-professor"><i class="fa fa-search"></i> Buscar Profesor</div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;" id="professors_table">

                </div>
            </div>
    </div>
</div>