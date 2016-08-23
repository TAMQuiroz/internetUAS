@extends('app')
@section('content')

<div class="page-title">
  <div class="title_left">
    <h3> {{ $timeTable->Codigo }} - {{ $timeTable->courseXCicle->course->Nombre }} ({{ $timeTable->courseXCicle->course->Codigo }})</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			<div class="x_title">
              <h2>{{ $title }}</h2>
              <div class="clearfix"></div>
          	</div>
          	<form id="fileForm" action="{{route('addentryM.evidences', ['id' => $timeTable->IdHorario])}}" method="post" enctype="multipart/form-data">
			<div class="form-horizontal">
				<div class="form-group row">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select id="studentsResult" name="studentsResult" class="form-control col-md-7 col-xs-12" type="text">
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
				</div>
			</div>

			<div class="form-horizontal">
				<div class="form-group row">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Aspecto</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select id="aspect" name="aspect" class="form-control col-md-7 col-xs-12" type="text" disabled="true">
							<option value="-1">-- Seleccione --</option>
							@if($studentsResults != null)
								@foreach($studentsResults as $stdRslt)
									@foreach($stdRslt->aspects as $asp)
										@if($asp->Estado == 1)
											<option value="{{$asp->IdAspecto}}" class="aspect {{$stdRslt->IdResultadoEstudiantil}}" hidden="true">
												{{ $asp->Nombre }}
											</option>
										@endif
									@endforeach
								@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>

            <input id="courseId" name="courseId" type="text" name="code" readonly="true" value="4" hidden="true">

			<div class="form-horizontal">
				<div class="form-group row">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Criterio</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select id="criterion" name="criterion" class="form-control col-md-7 col-xs-12" type="text" disabled="true">
							<option value="-1">-- Seleccione --</option>
							@if($studentsResults != null)
							@foreach($studentsResults as $stdRslt)
							@foreach($stdRslt->aspects as $asp)
							@foreach($asp->criterion as $crt)
								@if($crt->Estado == 1)
							<option value="{{$crt->IdCriterio}}" class="criterion {{$asp->IdAspecto}}" hidden="true">
								{{ $crt->Nombre }}
							</option>
											@endif
							@endforeach
							@endforeach
							@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>

			<div class="form-horizontal">
				<div class="form-group row">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Instrumento de Medición</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select id="measuring" name="measuring" class="form-control col-md-7 col-xs-12" type="text" disabled="true">
							<option value="-1">-- Seleccione --</option>
							@if($sources != null)
							@foreach($sources as $src)
							<option value="{{$src->IdFuentexCursoxCriterioxCiclo}}" class="measuring {{$src->IdCriterio}}" hidden="true">
								{{ $src->measurementSource->Nombre }}
							</option> 
							@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>

			<div class="x_title opcion" hidden="true">
				<h2>Subir Evidencias de Medición</h2>
				<div class="clearfix"></div>
			</div>

			<div class="x_content opciones" hidden="false"> 
				
					<input id="file" type="file" name="filefield">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<br>
					<button class="btn btn-primary">Cargar Evidencias</button>
				
							<span id="errMsg" style="color:red">No ha seleccionado ningún archivo.</span>
							<br>

							<div class="x_title">
								<h2>Lista de Evidencias de Medición</h2>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="bs-docs-section">
									<div class="bs-glyphicons">
										<ul class="bs-glyphicons-list">
											@foreach($entries as $entry)
											<div>
												<input type="hidden" name="currFileId[]" class="currFile" value="{{ $entry->IdArchivoEntrada }}">
												<i class="fa fa-remove delete-evidence"
													data-toggle="modal" data-target=".bs-example-modal-sm"
													style="position:absolute; float:right; font-size:34px; margin:-8px 0 0 5px; cursor:pointer; border-radius:5px"
													onMouseOver="this.style.color='#fff'; this.style.background='#E74C3C'"
   													onMouseOut="this.style.color='#73879C'; this.style.background='#f9f9f9'">
												</i>
												<a href="{{route('getDownload.evidences', $entry->filename)}}" class="">
													<li style="margin-left:12px">
														<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
														<span class="glyphicon-class">{{$entry->original_filename}}</span>
													</li>
												</a>
											</div>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
				</div>
			</form>
						<div class="x_title">
							<h2></h2>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				//Code for :paolo: : showing error messages
				@if( @Session::has('error') )
	   				toastr.error('{{ @Session::get('error') }}');
				@endif
				$("#errMsg").hide();
				$('#fileForm').submit(function(){
					valid = true;
					$("#errMsg").hide();
					if($("#file").val() == ''){
						$("#errMsg").show();
						valid =  false;
					}

					return valid
				});
				//delete evidence
				$('.delete-evidence').on("click", function(event){
					var fileId = $(this).closest('div').find(".currFile").val();
					console.log(fileId);
					$('#modal-button').attr("href", baseUrl + "/myCourses/evidences/deleteM?fileid=" + fileId);
				});
			</script>
			<script type="text/javascript">
				$('#measuring').on("change", function(event){
				    var measuring = $("#measuring").val();

				    if(measuring != -1){
				      $('.opcion').attr('hidden', false);
				      $('.opciones').attr('hidden', false);
				    }else{
				      $('.opcion').attr('hidden', true);
				      $('.opciones').attr('hidden',true);
				    }
			  	});
			</script>
			<script type="text/javascript">
				$('#criterion').on("change", function(event){
				      $('.opcion').attr('hidden', true);
				      $('.opciones').attr('hidden',true);
			  	});
			</script>
			<script type="text/javascript">
				$('#aspect').on("change", function(event){
				      $('.opcion').attr('hidden', true);
				      $('.opciones').attr('hidden',true);
				    
			  	});
			</script>
			<script type="text/javascript">
				$('#studentsResult').on("change", function(event){
				      $('.opcion').attr('hidden', true);
				      $('.opciones').attr('hidden',true);
				    
			  	});
			</script>
	</div>
</div>

  <script src="{{ URL::asset('js/intranetjs/evidence/upload-measuring-script.js')}}"></script>
@include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar esta evidencia?', 'action' => '#', 'button' => 'Delete'])
@endsection