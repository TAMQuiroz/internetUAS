@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Alumnos</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Codigo</th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title">Apellido Paterno</th>
                        <th class="column-title">Apellido Materno</th> 
                        <th colspan="2">Acciones</th>               
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr> 
                            <td>{{$student->Student->Codigo}}</td> 
                            <td>{{$student->Student->Nombre}}</td> 
                            <td>{{$student->Student->ApellidoPaterno}}</td> 
                            <td>{{$student->Student->ApellidoMaterno}}</td>
                            <td>
                                <a href= "{{route('TeacherFinalScore.show', $student->id)}}" class="btn btn-primary btn-xs" title="Nota final de alumno"><i class="fa fa-list-ol"></i></a>
                         </td>               
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
                {{$students->links()}}
            </div>
        </div>
    </div>
@endsection