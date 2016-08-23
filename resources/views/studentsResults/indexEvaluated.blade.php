@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{ $title }}</h3>
	</div>
</div>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				
				@if($studentsResults!=null)
				<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
					<thead>
						<tr class="headings">
							<th class="column-title">Identificador</th>
							<th class="column-title">Descripción</th>
						</tr>
					</thead>
					<tbody>						
						@foreach($studentsResults as $stRst)
						<tr class="even pointer">
							
							<td class=" ">@if($stRst!=null) {{ $stRst->Identificador }} @endif</td>
							<td class=" ">@if($stRst!=null) {{ $stRst->Descripcion }} @endif</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>

				@else
				<div class="row">
			      <div class="col-md-12 col-sm-12 col-xs-12">
			        <div class="alert alert-warning">
			          <strong>Advertencia: </strong> No hay Resultados Estudiantiles Asociados
			        </div>
			      </div>
			    </div>
				@endif
				

				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						<a href="{{ route('editEvaluated.studentsResult') }}" class="btn btn-success pull-right"> Editar</a>
					</div>                                         
				</div>
				

			</div>
		</div>
	</div>
</div>

@endsection