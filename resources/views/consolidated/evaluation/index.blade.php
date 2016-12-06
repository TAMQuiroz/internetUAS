@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Consolidado de Evaluación @if($cycle != null){{$cycle->Descripcion}}@endif</h3>
	</div>
</div>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<div class="form-horizontal">
					<div class="row" style="margin-top: 10px;margin-bottom: 10px;">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Ciclo Académico </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control cycle" name="cycle" id="cycle">
								<option value="0">-- Seleccione --</option>
								@foreach($academicCycle as $ac)
									<option value="{{$ac->IdCicloAcademico}}"
											@if ($cycle != null)
											<?php if ($cycle->IdCicloAcademico == $ac->IdCicloAcademico): ?>
											selected="true"
									<?php endif ?>
											@endif
									>{{$ac->Descripcion}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@if($cyclexresult != null)



<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Matriz de Aporte a los Resultados Estudiantiles</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="row">
					@if(count($contribution) != 0)
						<div class="col-md-12 col-sm-12 col-xs-12">
							<strong>{{$contribution[0]->studentsResult->Identificador}} - {{$contribution[0]->studentsResult->Descripcion}}</strong>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-12 col-md-offset-1 col-sm-offset-1">
							<p>
								<h5>Cursos Aportantes</h5>
								<ul>
								@foreach($contribution as $c)
									@if($c->IdResultadoEstudiantil == $contribution[0]->IdResultadoEstudiantil && $c->Valor==1)
										<li>{{$c->courses->Codigo}} - {{$c->courses->Nombre}}</li>
									@endif
								@endforeach
								</ul>
							</p>
						</div>
						@for($i=1; $i<count($contribution);$i++)
						@if($contribution[$i-1]->IdResultadoEstudiantil != $contribution[$i]->IdResultadoEstudiantil)
							<div class="col-md-12 col-sm-12 col-xs-12">
								<strong>{{$contribution[$i]->studentsResult->Identificador}} - {{$contribution[$i]->studentsResult->Descripcion}}</strong>
							</div>
							<div class="col-md-11 col-sm-11 col-xs-12 col-md-offset-1 col-sm-offset-1">
								<p>
									<h5>Cursos Aportantes</h5>
									<ul>
									@foreach($contribution as $con)
										@if($con->IdResultadoEstudiantil == $contribution[$i]->IdResultadoEstudiantil && $con->Valor==1)
											<li>{{$con->courses->Codigo}} - {{$con->courses->Nombre}}</li>
										@endif
									@endforeach
									</ul>
								</p>
							</div>
						@endif
						@endfor
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Resultados Estudiantiles Evaluados</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						@if($cyclexresult != null)
							@foreach($cyclexresult as $cxr)
								<strong>{{$cxr->studentsResult->Identificador}} - {{$cxr->studentsResult->Descripcion}}</strong><br>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Cursos Evaluados</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<strong>Según Evidencia de Medición y del Curso</strong>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12 col-md-offset-1 col-sm-offset-1">
						<p>
							<ul>
								@if($dictatedcourses!= null)
									@foreach($dictatedcourses as $dc)
										@if($dc->Evaluado!=null)
											<li>{{$dc->course->Codigo}} - {{$dc->course->Nombre}}</li>
										@endif
									@endforeach
								@endif
							</ul>
						</p>
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<strong>Según Evidencia del Curso</strong>
					</div>
					<div class="col-md-11 col-sm-11 col-xs-12 col-md-offset-1 col-sm-offset-1">
						<p>
							<ul>
								@if($dictatedcourses!= null)
									@foreach($dictatedcourses as $dc)
										@if($dc->Evaluado==null)
											<li>{{$dc->course->Codigo}} - {{$dc->course->Nombre}}</li>
										@endif
									@endforeach
								@endif
							</ul>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endif

  <script src="{{ URL::asset('js/intranetjs/consolidated/evaluation-script.js')}}"></script>

@endsection