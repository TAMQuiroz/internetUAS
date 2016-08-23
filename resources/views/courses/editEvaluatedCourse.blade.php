@extends('app')
@section('content')

          <div class="page-title">
                <div class="title_left">
                  <h3>{{ $title }}</h3>
                </div>
          </div>
          
          <div class="clearfix"></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel">
                    <div class="x_content">

                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Codigo<span></span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input id="educationalObjetive_code" class="form-control col-md-7 col-xs-12" type="text" name="educationalObjetive_code" readonly >
                        </div>
                      </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input id="educationalObjetive_number" class="form-control col-md-7 col-xs-12" type="text" name="educationalObjetive_number" readonly>
                        </div>
                      </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                    <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil<span></span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="studentResult-name" class="form-control col-md-7 col-xs-12" type="text" name="studentResult-name" >
                            <option value="">--Seleccione--</option>
                            @foreach($studentsResults as $res)
                              <option value="{{ $res->IdResultadoEstudiantil }}">$res->Identificador</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                    <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Peso<span></span></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="rubric-name" class="form-control col-md-7 col-xs-12" type="text" name="rubric-name" >
                            <option value="">--Seleccione--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>                              
                          </select>
                        </div>
                        </div>
                      </div>
                    </div>

                  <div>
                </div>
              </div>
            
                  <div class="clearfix"></div>
                  <div class="col-md-9 col-sm-9 col-xs-9"></div>
                         <a class="btn btn-default submit" href="{{ route('index.evaluatedCourses') }}">Cancelar</a>
                          <button class="btn btn-success submit" href="#" type="submit">Guardar</button>
                      </div>
                  </div>
          </form>
@endsection
