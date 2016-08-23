@extends('app')
@section('content')

<div class="page-title">
  <div class="title_left">
    <h3> {{ $timeTable->Codigo }} - {{ $timeTable->courseXCicle->course->Nombre }} ({{ $timeTable->courseXCicle->course->Codigo }})</h3>
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">

          <form action="{{ route('saveTable.myCourses') }}" method="POST" class="form-horizontal" novalidate="true">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="x_title">
              <h2>{{ $title }}</h2>
              <div class="clearfix"></div>
          </div>

              <div class="form-group row">
                  <label for="middle-name" class="col-md-12 col-sm-12 col-xs-12 pull-right">
                      Cada criterio se califica del 1 al {{$cantLevels}}
                  </label>
                  <label for="middle-name" class="col-md-12 col-sm-12 col-xs-12 pull-left">
                      La calificación aceptable es del {{$minLevel}} al {{$cantLevels}}
                  </label>
                  <input type="hidden" id="cantLevels" value="{{ $cantLevels }}">
              </div>

          <!--#Barra de Progreso-->
          <div class="form-group row">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Progreso: {{ $progress }}%</label>
              <div class="progress">
                  <div id="stuProgressBar" class="progress-bar progress-bar-success" data-transitiongoal="{{ $progress }}" aria-valuenow="100" style="width: 100%;"></div>
              </div>
          </div>
          <!--/#Barra de Progreso-->

          <div class="x_title">
              <h2> Calificación por Criterios   </h2>
              <div class="clearfix"></div>
          </div>

          <!--#Resultado Estudiantil-->
          <div class="form-group row">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="studentsResult" class="form-control col-md-7 col-xs-12" type="text">
                      <option value="-1">-- Seleccione --</option>
                      @if($studentsResults != null)
                          @foreach($studentsResults as $stdRslt)
                              <option value="{{$stdRslt->IdResultadoEstudiantil}}">
                                  {{ $stdRslt->Identificador }} - {{ $stdRslt->Descripcion }}
                              </option>
                          @endforeach
                      @endif
                  </select>
              </div>
          </div> <!--/Resultado Estudiantil-->

          <!--#Aspecto-->
          <div class="form-group row">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aspecto</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="aspect" class="form-control col-md-7 col-xs-12" type="text" disabled="true">
                      <option value="-1">-- Seleccione --</option>
                      @if($studentsResults != null)
                          @foreach($studentsResults as $stdRslt)
                              @foreach($stdRslt->aspects as $asp)
                                  @if($asp->Estado == 1)
                                      <option value="{{$asp->IdAspecto}}" class="studentsResult {{$stdRslt->IdResultadoEstudiantil}}">
                                          {{ $asp->Nombre }}
                                      </option>
                                  @endif
                              @endforeach
                          @endforeach
                      @endif
                  </select>
              </div>
          </div>
          <!--/#Aspecto-->

          <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <colgroup span="10"></colgroup>
            <tr class="success">
                <th rowspan="2" class="text-center col-md-1"> Código </th>
                <th rowspan="2" class="text-center col-md-4"> Nombre del Alumno </th>
                <th colspan="10" scope="colgroup" class="text-center" id="titleCriterions" hidden> Criterio </th>
            </tr>
            <tr class="success" id="criterions" hidden>
                <!--#Listar Criterios-->
                @if($studentsResults != null)
                    @foreach($studentsResults as $stdRslt)
                        @foreach($stdRslt->aspects as $asp)
                            @foreach($asp->criterion as $crt)
                                <th scope="col" class="text-center aspect {{$asp->IdAspecto}}" hidden> {{$crt->Nombre}}  </th>
                        @endforeach
                    @endforeach
                @endforeach
            @endif
            <!--/#Listar Criterio-->
            </tr>
            </thead>
            <tbody>
              @foreach ( $students as $stu)
                <tr>
                  <td class=""> {{$stu->Codigo}} </td>
                    <td class=""> {{$stu->Nombre}}</td>
                    <!--#Columna de notas de criterios-->
                    @if($studentsResults != null)
                        @foreach($studentsResults as $stdRslt)
                            @foreach($stdRslt->aspects as $asp)
                                @foreach($asp->criterion as $crt)
                                    <td class="center text-center aspect {{$asp->IdAspecto}}" hidden>
                                        <button type="button" class="score btn btn-primary btn-xs minusGrade pull-left">
                                            <span class="fa fa-minus"></span>
                                        </button>

                                        <?php $nota = 0; ?>
                                        @foreach($scores as $score)
                                            @if($score->IdCriterio == $crt->IdCriterio and $score->IdAlumno == $stu->IdAlumno)
                                                <?php $nota = $score->Nota; ?>
                                            @endif
                                        @endforeach

                                        <input id="stuGrade" name="{{$timeTable->IdHorario}}/{{$stu->IdAlumno}}-{{$crt->IdCriterio}}" class="studentsTableGridInput" value="{{$nota}}" readonly=""  />
                                        <button type="button" class="score btn btn-primary btn-xs plusGrade pull-right">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </td>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endif
                    <!--/#Columna de notas de criterios-->
                </tr>
              @endforeach  
            </tbody>
                      
          </table>

        <div class="clearfix"></div>
        <div class="separator"></div>

        <div class="row">
          <div class="col-md-9 col-sm-12 col-xs-12">
             <button class="btn btn-success pull-right submit" type="submit" id="save"> Guardar</button>
             <a href="{{ route('index.myCourses') }}" class="btn btn-default pull-right"> Cancelar</a>
          </div>
        </div>
          </form>

      </div><!--xcontent-->
    </div>
  </div>
</div>

<script src="{{ URL::asset('js/datatables/jquery.dataTables.min.js')}}"></script>
<!--<script src="{{ URL::asset('js/datatables/dataTables.bootstrap.min.js')}}"></script>-->
<script src="{{ URL::asset('js/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('js/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/datatables/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('js/datatables/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ URL::asset('js/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{ URL::asset('js/datatables/dataTables.responsive.min.js')}}"></script>
<!--<script src="{{ URL::asset('js/datatables/responsive.bootstrap.js')}}"></script>-->
<script src="{{ URL::asset('js/datatables/datatables.scroller.min.js')}}"></script>


<script src="{{ URL::asset('js/intranetjs/courses/table-script.js')}}"></script>

@endsection