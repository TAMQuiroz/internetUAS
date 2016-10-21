@extends ('base')
@section ('contenido')

<!-- Estos linea es para las migajas-->
<nav class="red lighten-2">
  <div class="nav-wrapper container">
    <div class="col s12">
    	<a href="#" class="breadcrumb">Facultad</a>
      	<a href="#" class="breadcrumb">Profesor</a>
    </div>
  </div>
</nav>


<div class="container">
	<div class= "row">
		<h3 class="red-text">Lista de profesores</h3>
	</div>

	<div class= "row">
		<div class="col s12 right-align">
			<a href="{{url('flujoAdministrador/facultad/'.$idEspecialidad.'/profesor/create')}}" class="waves-effect waves-light btn">+ Nuevo profesor</a>
		</div>
		
	</div>

	<div class= "row">
		<table class= "bordered highlight responsive-table">
	        <thead>
	         	<tr>
	          		<th data-field="codigo">Código</th>
	                <th data-field="nombre">Nombre</th>
	                <th data-field="correo">Correo</th>
	                <th data-field="categoria">Categoria</th>
	                <th data-field="acciones">Acciones</th>
	            </tr>
	        </thead>

	        <tbody>

	        	@foreach ($teachers as $teach)
	            <tr>
	                <td class="teacherid" hidden="true">{{$teach->IdDocente}}</td>
	                <td class="teachercode">{{$teach->Codigo}}</td>
	                <td class=" ">{{$teach->Nombre}} {{$teach->ApellidoPaterno}} {{$teach->ApellidoMaterno}}</td>
	                <td class="teacherspecialtyId" hidden="true">{{$teach->IdEspecialidad}}</td>
	                <td class="teacherEmail">{{$teach->Correo}}</td>
	                <td class="teacherCategory">{{$teach->Cargo}} </td>

		            <td>
		            	<a href="" title="Editar"><i class="material-icons">view</i></a>
		            	<a href="" title="Editar"><i class="material-icons">edit</i></a>
		            	<a href="" title="Borrar"><i class="material-icons">delete</i></a>
		            </td>

		        </tr>   

		        @endforeach

	        </tbody>
	    </table>		
		

	</div>

	<!--Los botones-->
   <div class= "row">
		<div class="col s12 right-align">
			<a href="#!" class="waves-effect waves-light btn">Siguiente
				<i class="material-icons right">skip_next</i>
			</a>

		</div>		
	</div>
	


</div>
<br>
@endsection