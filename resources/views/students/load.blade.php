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

     	 	<div class="row">
     	 		<div class="col-md-6">
	     	 		<form style="border: 4px  #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('upload.students') }}" class="form-horizontal" method="post" enctype="multipart/form-data" id="stuFileForm">
						<input type="file" name="import_file" id="stuFile" accept=".xls,.xlsx" />
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="idTimeTable" value="{{ $timeTable->IdHorario }}">
						<br>
						PSP
						<input type="checkbox" class="selectPsp" id="selectPsp" name="selectPsp" value="">
						<br>
						<br>
						<br>						
						<button class="btn btn-primary">Cargar alumnos</button>

					</form>
					<span id="errMsg" style="color:red">No ha seleccionado ningún archivo.</span>
     	 		</div>

				<div class="col-md-6">
					<div><b>Ejemplo de formato:</b></div>
					<img id="img-formato-carga" src="http://internetuas/images/exampleExcel.png" class="img-responsive img-thumbnail">
					<!--
					{{ Html::image(asset('images/exampleExcel.png'), null ,['class' => 'img-responsive img-thumbnail'])}}
					-->
				</div>
     	 	</div>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			@if ($studentsExist)
			<div class=" sidebar-widget col-md-8 col-sm-8 col-xs-12" style="">
				<div class="bs-docs-section " style="border: 4px  #a1a1a1;margin-top: 9px;padding: 10px;">
					<ul class="bs-glyphicons-list">
						<li class="delete-students-list" data-toggle="modal" data-target=".bs-example-modal-sm"
							style="width:85px; border:1px solid #abd9ea; border-radius:5px; text-align:center; cursor:pointer" 
   							onMouseOver="this.style.color='#abd9ea'; this.style.background='#E74C3C'"
   							onMouseOut="this.style.color='#73879C'; this.style.background='#f9f9f9'">
   							<i class="fa fa-remove" style="position:relative; float:right; font-size:22px; margin:-8px -8px 0 0"></i>
							<span class="glyphicon glyphicon-copy" aria-hidden="true" style="font-size:51px"></span>
							<span class="glyphicon-class">Alumnos del horario</span>
						</li>
					</ul>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		//Code for showing error messages
		@if( @Session::has('error') )
		   toastr.error('{{ @Session::get('error') }}');
		@endif

		//validate upload file
		//console.log($('#selectPsp'));
		$('#selectPsp').change( function(){
			//console.log($('#selectPsp'));
			//alert("asdasd");
			

			if(this.checked){
				console.log("psp");
				var src = $("#img-formato-carga").attr("src").replace("exampleExcel.png", "exampleExcel_usuario.png");
            	$("#img-formato-carga").attr("src", src);
			}
			else {
				console.log("no psp");
				var src = $("#img-formato-carga").attr("src").replace("exampleExcel_usuario.png", "exampleExcel.png");
            	$("#img-formato-carga").attr("src", src);
			}
		});


		$("#errMsg").hide();
		$('#stuFileForm').submit(function(){
		    valid = true;
		    $("#errMsg").hide();
		    if($("#stuFile").val() == ''){
			    $("#errMsg").show();
		    	valid =  false;
	    	}
	    	return valid
		});

		//delete students list
		$('.delete-students-list').on("click", function(event){
			var classId = $('input[name=idTimeTable]').val();
			console.log(classId);
			$('#modal-button').attr("href", baseUrl + "/myCourses/students/delete?timeTableId=" + classId);
		});
	});
</script>
@include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar la lista de alumnos? (Solo podrá hacerlo si los alumnos aún no han recibido calificaciones).', 'action' => '#', 'button' => 'Delete'])
@endsection