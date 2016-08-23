@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{ $title }}</h3>
	</div>
</div>

<form action="{{ route('updateEvaluated.studentsResult') }}" method="POST" id="formCyclexResult" class="form-horizontal"> 
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
								<input type="checkbox" id="stRstCheckAll" name="stRstCheckAll" class="">
							</th>
							<th class="column-title">Identificador</th>
							<th class="column-title">Descripción</th>
							
						</tr>
					</thead>
					<tbody>
						@if($studentsResults!=null)
						@foreach($studentsResults as $stRst)
						<tr class="even pointer">
							<?php $temp = ""; ?>
	                        @if($results!=null)
		                        @foreach($results as $rst)
		                          @if($rst!=null AND $rst->IdResultadoEstudiantil == $stRst->IdResultadoEstudiantil)
		                            <?php $temp = "checked"; ?>                              
		                          @endif
		                        @endforeach
	                        @endif
							<td class="a-center ">
								<input value="@if($stRst!=null) {{ $stRst->IdResultadoEstudiantil }} @endif" type="checkbox" class="stRstCheck" id="stRstCheck" name="stRstCheck[]" {{ $temp }}>
							</td>
							<td class=" ">@if($stRst!=null) {{ $stRst->Identificador }} @endif</td>
							<td class=" ">@if($stRst!=null) {{ $stRst->Descripcion }} @endif</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>

				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						<button class="btn btn-success submit pull-right" type="submit">Guardar</button>
						<a href="{{ route('indexEvaluated.studentsResult') }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>                                         
				</div>

			</div>
		</div>
	</div>
</div>

</form>

<script type="text/javascript">
	$("#stRstCheckAll").change(function () {
		$('.stRstCheck').prop("checked", $(this).prop("checked"));
	});
</script>

@endsection