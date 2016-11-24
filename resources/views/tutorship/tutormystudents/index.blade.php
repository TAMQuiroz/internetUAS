@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Mis Alumnos</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">            
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <a href="#filter-mystudents" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">Estado </th>
                            <th class="column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th>
                            <th class="column-title">Correo</th>
                            <th class="column-title">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $student->id }}</td>

                            @if (!$student->trashed()) 
                            <td class=""><span class="label label-success"> Activo </span></td>
                            @else
                            <td class=""><span class="label label-danger"> Inactivo </span></td>
                            @endif

                            <td class=" ">{{ $student->codigo }}</td>
                            <td class=" ">{{ $student->ape_paterno.' '.$student->ape_materno.', '.$student->nombre }}</td>

                            <td class=" ">{{ $student->correo }}</td>                       

                            <td class=" ">
                                @if(!$student->trashed())
                                <a title="Visualizar" href="{{route('mis_alumnos.show',$student->id)}}" class="btn btn-primary btn-xs view-group">
                                <i class="fa fa-eye"></i>
                                </a>
                                <a title="Solicitar cita" href="{{route('cita_alumno.create',$student->id)}}" class="btn btn-primary btn-xs view-group">
                                    <i class="fa fa-calendar-o"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
</div>
</div>

<div class="remodal" data-remodal-id="filter-mystudents" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div class="text-left">
    <p style="font-size: 18px"><strong>Filtros de búsqueda</strong></p>
    <p style="font-size: 16px">Selecciones uno o más filtros:</p>
</div>
<form method="GET" action="{{route('mis_alumnos.index')}}">
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
    </div>
    <div class="flex-container has-flex-end" style="margin-top: 15px">
      <button data-remodal-action="cancel" class="btn btn-danger">Cancel</button>
      <button class="btn btn-submit" type="submit">OK</button>
  </div>
</form>
</div>

@endsection