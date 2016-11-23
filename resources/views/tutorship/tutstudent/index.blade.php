@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Alumnos de {{Session::get('faculty-name')}}</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="">            
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#filter-students" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{route('alumno.asignar')}}" class="btn btn-primary pull-left"><i class="fa fa-arrows-alt"></i> Asignar tutores</a>
                        </div>
                        <div class="col-md-6">
                            <div class="dropdown pull-right">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                 <i class="fa fa-plus"></i> Nuevo
                                 <span class="caret"></span>
                                </button>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="{{ route('alumno.createAll') }}">Cargar alumnos</a></li>
                                    <li><a href="{{ route('alumno.create') }}">Nuevo alumno</a></li>
                                </ul>
                            </div>
                        </div>                  


                    </div>

                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="centered column-title">Estado </th>
                            <th class="centered column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th> 
                            <th class="column-title">Tutor </th>
                            <th class="centered column-title last">Acciones</th>               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $student->id }}</td>

                            @if (!$student->trashed()) 
                            <td class="centered"><span class="label label-success"> Activo </span></td>
                            @else
                            <td class="centered"><span class="label label-default"> Inactivo </span></td>
                            @endif

                            <td class="centered ">{{ $student->codigo }}</td>
                            <td class=" ">{{ $student->ape_paterno.' '.$student->ape_materno.', '.$student->nombre }}</td>  
                            @if($student->id_tutoria == null)
                            <td class="centered ">-</td>
                            @else
                            <td class=" ">{{explode(' ',trim($student->tutorship->tutor->Nombre))[0]    .' '.$student->tutorship->tutor->ApellidoPaterno}}</td>
                            @endif                          

                            <td class="centered ">
                                @if(!$student->trashed())
                                <a href="{{route('alumno.show',$student->id)}}" title="Visualizar" class="btn btn-primary btn-xs view-group">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('alumno.edit',$student->id)}}" title="Editar" class="btn btn-primary btn-xs view-group">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" title="Desactivar" data-toggle="modal" data-target="#{{$student->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                                @else
                                <a href="{{route('alumno.restore', ['id' => $student->id])}}" title="Activar" class="btn btn-primary btn-xs delete-group">
                                    <i class="fa fa-check"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $student->id, 'message' => '¿Está seguro que desea desactivar este alumno?', 'route' => route('alumno.delete', $student->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="remodal" data-remodal-id="filter-students" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
    <p style="font-size: 16px">Seleccione uno o más filtros:</p>
</div>
<form method="GET" action="{{route('alumno.index')}}">
    <div class="flex-container is-wrap has-space-between">
        <div class="flex-element input-container">
            <label class="label-input label-modal">Código</label>
            <input class="input-filter input-modal" type="text" name="code" maxlength="10">
        </div>
        <div class="flex-element input-container">
            <label class="label-input label-modal">Nombre</label>
            <input class="input-filter input-modal" type="text" name="name" maxlength="30">
        </div>
        <div class="flex-element input-container">
            <label class="label-input label-modal">Apellido Paterno</label>
            <input class="input-filter input-modal" type="text" name="lastName" maxlength="30">
        </div>
        <div class="flex-element input-container">
            <label class="label-input label-modal">Apellido Materno</label>
            <input class="input-filter input-modal" type="text" name="secondLastName" maxlength="30">
        </div>
        <div class="flex-element input-container has-select">
            <label class="label-input label-modal">Tutor</label>
            <select class="form-control input-filter" name="tutorId">
                <option value>Todos</option>
                @foreach ($tutors as $tutor)
                <option value="{{$tutor->IdDocente}}">{{$tutor->ApellidoPaterno . " " . $tutor->ApellidoMaterno . ", " . $tutor->Nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex-container has-flex-end" style="margin-top: 15px">
      <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
      <button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
  </div>
</form>
</div>

@endsection