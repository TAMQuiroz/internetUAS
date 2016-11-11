@extends('appWithoutHamburger')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{ $title }}</h3>
	</div>
</div>

<form action="{{ route('cursosCiclo_update.flujoCoordinador', $idEspecialidad) }}" method="POST" id="formCyclexResult" name="formCyclexResult" class="form-horizontal"> 
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				

				<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
					<thead>
						<tr class="headings">
							<th>
								<input type="checkbox" id="select_all" name="select_all" class="">
							</th>
							<th class=" ">Código</th>
							<th class=" ">Nombre del Curso</th>
							<th class=" ">Nivel Académico</th>
							<th class=" ">Especialidad</th>
						</tr>
					</thead>
					<tbody>
						@if($courses!=null)
							@if(!empty($dictatedCourses))
								<tr class="even pointer" hidden="true">
									<td class="a-center">
										<input value="0" type="checkbox" id="check" name="check[]" checked="true" onchange="c(this)" onclick="c(this)"></input>
									</td>
								</tr>						
								@foreach($courses as $course)

									<?php $temp = ""; ?>
				                        @if($dictatedCourses!=null)
					                        @foreach($dictatedCourses as $dic)
					                          @if($dic->IdCurso == $course->IdCurso)
					                            <?php $temp = "checked"; ?>                             
					                          @endif
					                        @endforeach
				                       	@endif

									<tr class="even pointer">

										<td class="a-center ">
											<input value="{{$course->IdCurso}}" type="checkbox" class="check" id="check" name="check[]" {{$temp}}></input>
										</td>
										<td class=" ">{{$course->Codigo}}</td>
										<td class=" ">{{$course->Nombre}}</td>
										@if($course->NivelAcademico==-1)
											<td class=" ">Electivo</td>
										@else
											<td class=" ">{{$course->NivelAcademico}}</td>
										@endif
										@if($course->specialty!=null)
											<td class=" ">{{$course->specialty->Nombre}}</td>
										@else
											<td class=" ">-</td>
										@endif
									</tr>
								@endforeach
							@else
								@foreach($courses as $course)
																								
								<tr class="even pointer">

									<td class="a-center ">
										<input value="{{$course->IdCurso}}" type="checkbox" class="check" id="check" name="check[]"></input>
									</td>
									<td class=" ">{{$course->Codigo}}</td>
									<td class=" ">{{$course->Nombre}}</td>
									@if($course->NivelAcademico==-1)
										<td class=" ">Electivo</td>
									@else
										<td class=" ">{{$course->NivelAcademico}}</td>
									@endif
									@if($course->specialty!=null)
										<td class=" ">{{$course->specialty->Nombre}}</td>
									@else
										<td class=" ">-</td>
									@endif
								</tr>
								@endforeach
							@endif
						@endif
					</tbody>
				</table>

				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						<button class="btn btn-success submit pull-right" type="submit">Guardar</button>
						<a href="{{ route('cursosCiclo_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>                                         
				</div>

			</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript"> 
    function c(a) 
    { 
        a.checked='checked'; 
    } 
</script> 
<script type="text/javascript">
$("#select_all").change(function () {
	$('.check').prop("checked", $(this).prop("checked"));
});
</script>
@endsection