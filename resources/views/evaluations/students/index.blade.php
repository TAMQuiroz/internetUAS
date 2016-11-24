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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="#filter-students" class="btn btn-warning pull-left"><i class="fa fa-filter"></i> Filtrar</a>
                </div>                
                
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="15%" >
                    <col width="70%">
                    <col width="15%">
                    <thead>
                        <tr class="headings">
                            <th class="centered column-title">Código </th>
                            <th class="column-title">Apellidos y Nombres </th>
                            <th class="centered column-title last">Acciones</th>               
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        @if(!$student->trashed())
                        <tr class="even pointer">
                            <td hidden class="group-id">{{ $student->id }}</td>
                            <td class="centered ">{{ $student->codigo }}</td>
                            <td class=" ">{{ $student->ape_paterno.' '.$student->ape_materno.', '.$student->nombre }}</td>
                            <td class="centered ">                                
                                <a href="{{route('evstudent.show',$student->id)}}" title="Visualizar" class="btn btn-primary btn-xs view-group">
                                    <i class="fa fa-eye"></i>
                                </a> 
                            </td>
                        </tr>                        
                        @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $students->links() }}
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
<form method="GET" action="{{route('evstudent.index')}}">
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
      <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
      <button class="btn btn-submit" type="submit"><i class="fa fa-search"></i> Buscar</button>
  </div>
</form>
</div>

@endsection