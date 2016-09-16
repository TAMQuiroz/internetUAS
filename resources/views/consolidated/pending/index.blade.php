@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Consolidado de estado de tablas de desempeño</h3>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="x_panel">
	    <div class="x_content">

	      <table class="table table-striped responsive-utilities jambo_table bulk_action" id="aspect-table">
	        <thead>
	          <tr class="headings">
	          	<th class="col-sm-1 column-title"> Estado</th>
	            <th class="col-sm-1 column-title">Codigo de Horario</th>
	            <th class="col-sm-3  column-title">Curso</th>
	            <th class="col-sm-7 column-title">Nombre del Profesor</th>
	          </tr>
	        </thead>

	        <tbody>

	          @foreach($pending as $asp)
	          <tr class="even pointer aspect">
	          	@if($asp['status'] == 1)
	            <td><span class="label label-success"> Subido </span></td>
	            @else
	            <td><span class="label label-danger"> Pendiente </span></td>
	            @endif
	            <td>{{$asp['horario']->Codigo}}</td>
	            <td>{{$asp['horario']->courseXCicle->course->Nombre}}</td>
	            <td>{{$asp['docente']->Nombre}} {{$asp['docente']->ApellidoPaterno}}</td>
	          </tr>
	          @endforeach

	        </tbody>
	      </table>

	    </div>
	  </div>
	</div>
</div>
@endsection	