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
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title">Configuración</h3>
      </div>
        <div class="panel-body">

          {{Form::open(['route' => 'reporteISP.generateISP', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}
            <div class="form-group">
              {{Form::label('Especialidad',null,['class'=>'control-label col-md-4 col-sm-3 col-xs-12'])}}
              <div class="col-xs-12 col-md-4">

                {{Form::select('especialidad',$comboEspecialidades, $idEsp, ['class'=>'form-control', 'required'])}}
              </div>
            </div>

            <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
              {{Form::submit('Generar', ['class'=>'btn btn-success pull-right'])}}
              <a class="btn btn-default pull-right" href="{{ route('reporteISP.index') }}">Cancelar</a>
            </div>
          </div>
          {{Form::close()}}

        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
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
          <table class="table table-list-search-investigator table-striped responsive-utilities jambo_table bulk_action"> 
            <thead> 
              <tr> 
                <th>Nombre</th> 
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Especialidad</th>
                <th>Cantidad de proyectos</th>
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
                      <th>Cantidad de integrantes</th> 
                      <th>Estado</th>
                    </thead>
                    <tbody>
                      @foreach($investigador->projects as $proyecto)
                      <tr>
                        <td>{{$proyecto->nombre}}</td> 
                        <td>{{$proyecto->fecha_fin}}</td> 
                        <td>{{$proyecto->area->nombre}}</td> 
                        <td>{{count($proyecto->investigators) + count($proyecto->teachers)}}</td>
                        <td>
                        @if($proyecto->status)
                          {{$proyecto->status->nombre}}
                        @endif
                        </td>
                      </tr>
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
    <div class="panel panel-default">
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
          <table class="table table-list-search-teacher table-striped responsive-utilities jambo_table bulk_action"> 
            <thead> 
              <tr> 
                <th>Nombre</th> 
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Especialidad</th>
                <th>Cantidad de proyectos</th>
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
                      <th>Cantidad de integrantes</th> 
                      <th>Estado</th>
                    </thead>
                    <tbody>
                      @foreach($profesor->projects as $proyecto)
                      <tr>
                        <td>{{$proyecto->nombre}}</td> 
                        <td>{{$proyecto->fecha_fin}}</td> 
                        <td>{{$proyecto->area->nombre}}</td> 
                        <td>{{count($proyecto->investigators) + count($proyecto->teachers)}}</td>
                        <td>
                        @if($proyecto->status)
                          {{$proyecto->status->nombre}}
                        @endif
                        </td>
                      </tr>
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

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>
<script src="{{ URL::asset('js/intranetjs/report/index-reportISP.js')}}"></script>

@endsection
