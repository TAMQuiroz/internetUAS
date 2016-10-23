@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Editar evaluador</h3>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
				{{Form::open(['route' =>['evaluador.update',$teacher->IdDocente], 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}				
				<div class="form-group">
					{{Form::label('Profesor: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-4'])}}
					<div class="col-md-5 col-sm-5 col-xs-5">
						{{Form::text('nombre',$teacher->ApellidoPaterno.' '.$teacher->ApellidoMaterno.', '.$teacher->Nombre ,['class'=>'form-control','id'=>'nombre', 'required','readonly' ])}}
					</div>					
				</div>

				<div class="form-group">
					{{Form::label('Competencias: ',null,['class'=>'control-label col-md-4 col-sm-4 col-xs-4'])}}
					<div class="col-md-6">
						@foreach($competences as $competence)
						@if( in_array($competence->id, $arrayRelations) )
						<div class="checkbox">
							<label><input type="checkbox" checked name="arr_competencias[{{$competence->id}}]">{{$competence->nombre}}</label>
						</div>						
						@else
						<div class="checkbox">
							<label><input type="checkbox" name="arr_competencias[{{$competence->id}}]">{{$competence->nombre}}</label>
						</div>
						
						@endif						
						@endforeach						
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						{{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ route('evaluador.index') }}">Cancelar</a>
					</div>
				</div>
				{{Form::close()}}

			</div>
		</div>
	</div>
</div>
<script src="{{ URL::asset('js/myvalidations/regularprofessors.js')}}"></script> <!--Este script sirve para el buscar en modal-->

@endsection