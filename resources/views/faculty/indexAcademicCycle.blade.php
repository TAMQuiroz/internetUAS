@extends('app')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>{{$title}}</h3>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_content">
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a href="{{ route('newAcademicCycle.faculty') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nueva Especialidad</a>
				</div>
			</div>
			<div class="clearfix"></div>

			<table class="table table-striped responsive-utilities jambo_table">
				<thead>
					<tr class="headings">

						<th class="column-title">Código</th>
						<th class="column-title">Nombre</th>
						<th class="column-title">Coordinador</th>
						<th class="column-title last">Acciones</th>
					</tr>
				</thead>
				<tbody>
				@if (count($configs))
					@foreach($configs as $conf)

					@if (count($faculties))
					<tr>
						@foreach($faculties as $fac)
						@if ($fac->IdEspecialidad== $conf->IdEspecialidad)
                          <td> {{$fac->Codigo}}</td>
                          <td> {{$fac->Nombre}}</td>
                          @foreach($teachers as $tea)
						  @if ($tea->IdDocente== $conf->IdDocente)
                          <td> {{$tea->Nombre.' '.$tea->ApellidoPaterno}}</td>
                          @endif
                       	  @endforeach
                          <td>
							<a class="btn btn-primary btn-xs" onclick="show('{{$conf->IdConfEspecialidad}}')"><i class="fa fa-search"></i></a>
							<a href="{{ route('editAcademicCycle.faculty', ['faculty-code' =>$conf->IdConfEspecialidad] ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
							
						</td>
                        @endif
                        @endforeach	
					</tr>
					@else
						<tr><td colspan="4" class="text-center">No se encontraron registros</td></tr>
					@endif	
					@endforeach
				@else
					<tr>
						<td colspan="4" class="text-center">No se encontraron registros	</td>
					</tr>
				@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	function show(id){
		$.get(baseUrl+'/faculty/viewAssign/' + id , function(data){
			$('#modal-faculty-assign #edit-button').attr("href", baseUrl + "/faculty/editAssign?faculty-code=" + id );
			$('#modal-faculty-assign #faculty-name').html(data.name);
			$('#modal-faculty-assign #faculty-coordinator').html(data.coordinator.Nombre);
			$('#modal-faculty-assign #faculty-agreement-level').html(data.conf.NivelEsperado);
			$('#modal-faculty-assign #criteria-level').html(data.conf.CantNivelCriterio);
			$('#modal-faculty-assign #faculty-agreement').html(data.conf.UmbralAceptacion);
			$('#modal-faculty-assign').modal();
		});
	}

</script>





@include('modals.delete-modal', ['message' => 'Do you want to delete this faculty?', 'action' => '#', 'button' => 'Delete'])
@include('faculty.viewAcademicCycle-modal', ['title' => 'Faculty #'])
@endsection