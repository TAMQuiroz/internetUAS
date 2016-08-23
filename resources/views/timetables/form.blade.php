@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>{{ $title }}</h3>
	</div>
</div>

<form action="{{ route('save.timetable') }}" method="POST" class="form-horizontal form-label-left">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input id="courseId" name="courseId" value="{{ $courseId }}" hidden>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="x_title">
                  <h2> Curso: {{ $courseName }}</h2>
                  <div class="clearfix"></div>
                </div>

				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="error">*</span> </label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="code" class="form-control col-md-7 col-xs-12" type="text" name="code">
					</div>
				</div>

				<div class="clearfix"></div>
				<div class="separator"></div>

				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						<h2> Profesores Asociados </h2>
					</div>
					<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
					<thead>
						<tr class="headings">
							<th class="column-title">Select</th>
							<th class="column-title">Código</th>
							<th class="column-title">Nombre</th>
						</tr>
					</thead>
					<tbody>
						@if($teachers!=null)
						@foreach($teachers as $teacher)
						<tr class="even pointer">
							<td>
								<input value="@if($teacher!=null) {{ $teacher->IdDocente }} @endif" type="checkbox" class="flat" id="teacher" name="teacher[]" >
							</td>
							<td class=" ">@if($teacher!=null) {{ $teacher->Codigo }} @endif</td>
							<td class=" ">@if($teacher!=null) {{$teacher->Nombre}} {{$teacher->ApellidoPaterno}} {{$teacher->ApellidoMaterno}} @endif</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
				</div>
				
				<div class="separator"></div>

				<div class="row">
					<div class="col-md-9 col-sm-12 col-xs-12">
						<button class="btn btn-success submit pull-right" type="submit">Guardar</button>
						<a href="{{ route('index.studentsResult') }}" class="btn btn-default pull-right"> Cancelar</a>
					</div>                                         
				</div>

			</div>
		</div>
	</div>
</div>

</form>

@endsection