@extends('app')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="page-title">
          <div class="title_left">
              <h3>Investigadores según Proyecto</h3>
          </div>
      </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title">Proyectos</h3>
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
          <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
            <thead> 
              <tr> 
                <th>Nombre</th> 
                <th>Fecha final</th> 
                <th>Area</th> 
                <th>Cantidad de integrantes</th> 
                <th>Estado</th> 
              </tr> 
            </thead> 
            <tbody> 
              @foreach($proyectos as $proyecto)
              <tr class="accordion-toggle" data-toggle="collapse" data-target="#{{$proyecto->id}}"> 
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
              
              <tr>
                <td class="accordion-body collapse" id="{{$proyecto->id}}">
                  <table class="table">
                    <thead>
                      <th>Investigador</th>
                      <th>Facultad</th>
                    </thead>
                    <tbody>
                      @foreach($proyecto->investigators as $investigator)
                      <tr>
                        <td>{{$investigador->nombre}} {{$investigador->ape_paterno}}</td>
                        <td>{{$investigador->faculty->nombre}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </td>
              </tr>
              @endforeach 
            </tbody> 
          </table>
        </div>

        </div>
    </div>
    </div>
</div>

<script src="{{ URL::asset('js/myvalidations/investigation.js')}}"></script>
<script src="{{ URL::asset('js/intranetjs/investigation/investigator/index-investigator.js')}}"></script>

@endsection
