@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{ $title }}</h3>
	</div>
</div>

<form action="{{ route('studentResult_store.flujoCoordinador', $id) }}" method="POST" id="formStudentsResult" novalidate="true" name="formStudentsResult" class="form-horizontal form-label-left">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" id="validateIdentifier" name="validateIdentifier" hidden>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Identificador <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="identifier" class="form-control col-md-7 col-xs-12" type="text" name="identifier" maxlength="1">
					</div>
				</div>
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="error">* </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<textarea id="description" class="resizable_textarea form-control" name="description"  style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;"></textarea>
					</div>
				</div>
				
				@if(count($educationalObjetives)==0)
			       <div class="row">
			        <div class="col-md-12 col-sm-12 col-xs-12">
			          <div class="alert alert-warning">
			            <strong>Advertencia: </strong> No hay Objetivos Educacionales Registrados, debe registrar Objetivos Educacionales primero.
			          </div>
			        </div>
			      </div>
			    @else

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h2> Asociar Objetivos Educacionales </h2>
						<div class="separator"></div>
					</div>
				</div>

				<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
					<thead>
						<tr class="headings">
							<th class="col-sm-2 column-title"></th>
							<th class=" " hidden="true">Identificador</th>
							<th class="col-sm-10 column-title">Objetivo Educacional</th>
						</tr>
					</thead>
					<tbody>

						@foreach($educationalObjetives as $objs)
						<tr class="even pointer">
							<td>
								<input value="@if($objs!=null) {{ $objs->IdObjetivoEducacional }} @endif" type="checkbox" class="flat" id="objsCheck" name="objsCheck[]" >
							</td>
							<td class=" " hidden="true">@if($objs!=null) {{ $objs->Numero }} @endif</td>
							<td class=" ">@if($objs!=null) {{ str_limit($objs->Descripcion, 80)}} @endif</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				@endif
				
				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						@if(count($educationalObjetives)!=0)
							<button class="btn btn-success submit pull-right" type="submit">Guardar</button>
						@endif
						<a href="{{ route('studentResult_index.flujoCoordinador', $id) }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>                                         
				</div>

			</div>
		</div>
	</div>
</div>
</form>

<script src="{{ URL::asset('js/myvalidations/studentsResult.js')}}"></script>

@endsection