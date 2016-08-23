@extends('app')
@section('content')

	<div class="page-title">
		<div class="title_left">
			<h3>{{ $timeTable->Codigo }} - {{ $timeTable->courseXCicle->course->Nombre }} ({{ $timeTable->courseXCicle->course->Codigo }})</h3>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>{{ $title }}</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-horizontal">
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Curso </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-12" type="text" name="course" id="course" value="{{$timeTable->courseXCicle->course->Nombre}}" readonly="true">
							</div>
						</div>
						<div class="form-group">
							<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Horario </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-12" type="text" name="course" id="course" value="{{$timeTable->Codigo}}" readonly="true">

							</div>
						</div>


						<div class="x_title">
							<h2>Subir</h2>

							<div class="clearfix"></div>
						</div>

						<div class="x_content">
							<form id="fileForm" action="{{route('addentry.evidences', ['id' => $timeTable->IdHorario])}}" method="post" enctype="multipart/form-data">
								<input id="file" type="file" name="filefield">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<br>
								<button class="btn btn-primary">Cargar evidencias</button>
							</form>
							<span id="errMsg" style="color:red">No ha seleccionado ningún archivo.</span>
							<br>

							<div class="x_title">
								<h2>Lista de evidencias</h2>
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
					$('#modal-button').attr("href", baseUrl + "/myCourses/evidences/delete?fileid=" + fileId);
				});
			</script>
@include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar esta evidencia?', 'action' => '#', 'button' => 'Delete'])
@endsection