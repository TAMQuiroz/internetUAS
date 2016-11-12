@extends(Auth::user() ? 'app' : 'appPublic')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="page-title">
          <div class="title_left">
              <h3>Investigadores y Profesores según Proyecto</h3>
          </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading">
          <h3 class="panel-title">Configuración</h3>
      </div>
        <div class="panel-body">

          {{Form::open(['route' => 'reporteISP.generateISP', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
            <div class="form-group">
              {{Form::label('Especialidad',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              <div class="col-xs-12 col-md-4">

                {{Form::select('especialidad',$comboEspecialidades, $idEsp, ['class'=>'form-control', 'id'=>'especialidad'])}}

              </div>
            </div>

            <div class="form-group">
              {{Form::label('Estado del proyecto',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              <div class="col-xs-12 col-md-4">

                {{Form::select('estadoP',$comboEstados, $idEstado, ['class'=>'form-control', 'id'=>'estadoP'])}}
              </div>
            </div>

            <div class="form-group">
              {{Form::label('Área del proyecto',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              <div class="col-xs-12 col-md-4">

                {{Form::select('areaP',$comboAreasP, $idAreaP, ['class'=>'form-control', 'id'=> 'areaP'])}}
              </div>
            </div>


            <div class="form-group">
              {{Form::label('Proyectos iniciados',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              <div class="col-xs-12 col-md-1">
                {{Form::date('fechaI',$fechaIni,['id'=>'fecha_ini','class'=>'form-control'])}}
              </div>
              <div class="col-xs-4 col-md-1 col-md-offset-1">
                {{Form::label('entre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              </div>
              <div class="col-xs-12 col-md-1">
                {{Form::date('fechaF',$fechaFin,['id'=>'fecha_fin','class'=>'form-control'])}}
              </div>
            </div>


            <div class="form-group">
              {{Form::label('N° de proyectos asignados',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              <div class="col-xs-4 col-md-1">
                {{Form::select('minProyectos',$comboMinP, $minP, ['class'=>'form-control', 'id'=>'minProyectos'])}}
              </div>
              <div class="col-xs-4 col-md-1 col-md-offset-1">
                {{Form::label('entre',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              </div>
              <div class="col-xs-4 col-md-1">
                {{Form::select('maxProyectos',$comboMaxP, $maxP, ['class'=>'form-control', 'maxProyectos'])}}

              </div>
            </div>

            <div class="form-group">
              {{Form::label('Todos',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}

              
              <div class="col-xs-4 col-md-1">
                {{Form::radio('radio','Si', ($opcion=='Si'), ['id' => 'radioB'])}} Si
              </div>

              <div class="col-xs-4 col-md-1">
                {{Form::radio('radio','No', ($opcion=='No'), ['id' => 'radioB2'])}} No
              </div>

            </div>

            <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
              {{Form::submit('Generar', ['class'=>'btn btn-success pull-right', 'id'=>'btnGenerar'])}}
              <a class="btn btn-default pull-right" href="{{ route('reporteISP.index') }}">Cancelar</a>
              <!--<a class="btn btn-default pull-right" href="{{ route('reporteISP.generarPDF') }}">PDF</a>-->
              <a class="btn btn-default pull-right" id="btnGraficos">Graficos</a>
            </div>
          </div>
          {{Form::close()}}

        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading">
          <h3 class="panel-title">Investigadores</h3>
      </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
                  <form action="#" method="get">
                      <div class="input-group">
                          <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                          <input class="form-control" id="investigator-search" name="q" placeholder="Buscar" required>
                          <span class="input-group-btn">
                              <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                          </span>
                      </div>
                  </form>
              </div>
        </div>

        <div class="table-responsive">
          <table id="tableI" class="table table-list-search-investigator table-striped responsive-utilities jambo_table bulk_action" > 
            <thead> 
              <tr> 
                <th>Nombre</th> 
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Especialidad</th>
                <th>Cantidad de proyectos asignados</th>
              </tr> 
            </thead>
            @if($investigadores != null) 
            <tbody>
              @foreach($investigadores as $investigador) 
              <tr class="accordion-toggle" data-toggle="collapse" data-target="#{{$investigador->id}}">
                <td>{{$investigador->nombre}}</td> 
                <td>{{$investigador->ape_paterno}}</td> 
                <td>{{$investigador->ape_materno}}</td> 
                <td>{{$investigador->correo}}</td> 
                <td>{{$investigador->faculty->Nombre}}</td>
                <td>{{count($investigador->projects)}} 
              </tr>    
              <tr>
                <td class="accordion-body collapse" id="{{$investigador->id}}">
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <th>Proyecto</th>
                      <th>Fecha final</th> 
                      <th>Area</th> 
                      <th>Estado</th>
                      <th>Cantidad de integrantes</th> 
                    </thead>
                    <tbody>
                      @foreach($investigador->projects as $proyecto)
                        @if($opcion == 'No')
                          @if($proyecto->fecha_ini >= $fechaIni && $proyecto->fecha_ini <= $fechaFin))
                            @if($idEstado == 0 || ($idEstado!=0 && ($proyecto->status->id == $idEstado)))
                              @if($idAreaP == 0 || ($idAreaP!=0 && ($proyecto->area->id == $idAreaP)))
                              <tr>
                                <td>{{$proyecto->nombre}}</td> 
                                <td>{{$proyecto->fecha_fin}}</td> 
                                <td>{{$proyecto->area->nombre}}</td> 
                                <td id="{{$proyecto->status->nombre}}">{{$proyecto->status->nombre}}</td>
                                <td>{{count($proyecto->investigators) + count($proyecto->teachers)}}</td>
                              </tr>
                              @endif
                            @endif
                          @endif
                        @elseif($opcion == 'Si')
                          <tr>
                            <td>{{$proyecto->nombre}}</td> 
                            <td>{{$proyecto->fecha_fin}}</td> 
                            <td>{{$proyecto->area->nombre}}</td> 
                            <td id="{{$proyecto->status->nombre}}">{{$proyecto->status->nombre}}</td>
                            <td>{{count($proyecto->investigators) + count($proyecto->teachers)}}</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </td>
              </tr>
              @endforeach 
            </tbody>
            @endif 
          </table>
        </div>

        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-info">
      <div class="panel-heading">
          <h3 class="panel-title">Profesores</h3>
      </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
                  <form action="#" method="get">
                      <div class="input-group">
                          <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                          <input class="form-control" id="teacher-search" name="q" placeholder="Buscar" required>
                          <span class="input-group-btn">
                              <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                          </span>
                      </div>
                  </form>
              </div>
        </div>

        <div class="table-responsive">
          <table id="tableP" class="table table-list-search-teacher table-striped responsive-utilities jambo_table bulk_action" > 
            <thead> 
              <tr> 
                <th>Nombre</th> 
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Especialidad</th>
                <th>Cantidad de proyectos asignados</th>
              </tr> 
            </thead>
            @if($profesores != null) 
            <tbody>
              @foreach($profesores as $profesor) 
              <tr class="accordion-toggle" data-toggle="collapse" data-target="#{{$profesor->IdDocente}}">
                <td>{{$profesor->Nombre}}</td> 
                <td>{{$profesor->ApellidoPaterno}}</td> 
                <td>{{$profesor->ApellidoMaterno}}</td> 
                <td>{{$profesor->Correo}}</td> 
                <td>{{$profesor->faculty->Nombre}}</td>
                <td align="center">{{count($profesor->projects)}} 
              </tr>    
              <tr>
                <td class="accordion-body collapse" id="{{$profesor->IdDocente}}">
                  <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                      <th>Proyecto</th>
                      <th>Fecha final</th> 
                      <th>Area</th> 
                      <th>Estado</th>
                      <th>Cantidad de integrantes</th> 
                    </thead>
                    <tbody>
                      @foreach($profesor->projects as $proyecto)
                        @if($opcion == 'No')
                          @if($proyecto->fecha_ini >= $fechaIni && $proyecto->fecha_ini <= $fechaFin))
                            @if($idEstado == 0 || ($idEstado!=0 && ($proyecto->status->id == $idEstado)))
                              @if($idAreaP == 0 || ($idAreaP!=0 && ($proyecto->area->id == $idAreaP)))
                              <tr>
                                <td>{{$proyecto->nombre}}</td> 
                                <td>{{$proyecto->fecha_fin}}</td> 
                                <td>{{$proyecto->area->nombre}}</td> 
                                <td>{{$proyecto->status->nombre}}</td>
                                <td>{{count($proyecto->investigators) + count($proyecto->teachers)}}</td>
                              </tr>
                              @endif
                            @endif
                          @endif
                        @elseif($opcion == 'Si')
                          <tr>
                            <td>{{$proyecto->nombre}}</td> 
                            <td>{{$proyecto->fecha_fin}}</td> 
                            <td>{{$proyecto->area->nombre}}</td> 
                            <td>{{$proyecto->status->nombre}}</td>
                            <td>{{count($proyecto->investigators) + count($proyecto->teachers)}}</td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </td>
              </tr>
              @endforeach 
            </tbody>
            @endif 
          </table>
        </div>

    </div>
    </div>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <div>
      <br><br>
    </div>
    <div id="pieI" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>
    <div>
      <br><br>
    </div>
    <div id="pieP" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>
    <div>
      <br><br>
    </div>
    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <div>
      <br><br>
    </div>
    <div id="areaChart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>
<script src="{{ URL::asset('js/intranetjs/report/index-reportISP.js')}}"></script>
<script src="{{ URL::asset('js/intranetjs/report/graph.js')}}"></script>

@endsection
