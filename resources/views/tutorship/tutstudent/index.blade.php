@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Alumnos de {{Session::get('faculty-name')}}</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">

            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <a href="" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                    <div class="col-md-6">
                        <a href="alumno.asignar" class="btn btn-primary "><i class="fa fa-arrows-alt"></i> Asignar tutores</a>
                    </div>
                    <div class="col-md-6">
                        <div class="dropdown">
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

        <div class="x_content">
            <div class="clearfix"></div>
        </div>
        <table class="table table-striped responsive-utilities jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">Estado </th>
                    <th class="column-title">Código </th>
                    <th class="column-title">Apellidos y Nombres </th> 
                    <th class="column-title">Tutor </th>
                    <th class="column-title last">Acciones</th>
                    <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
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
                    @if($student->id_tutoria == null)
                    <td class=" ">-</td>
                    @else
                    <td class=" ">Rios</td>
                    @endif                          
                    
                    <td class=" ">
                        <a href="{{route('alumno.show',$student->id)}}" class="btn btn-primary btn-xs view-group"">
                            <i class="fa fa-search"></i>
                        </a>
                        <a href="{{route('alumno.edit',$student->id)}}" class="btn btn-primary btn-xs view-group"">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$student->id}}">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
                @include('modals.delete', ['id'=> $student->id, 'message' => '¿Está seguro que desea desactivar este alumno?', 'route' => route('alumno.delete', $student->id)])
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection