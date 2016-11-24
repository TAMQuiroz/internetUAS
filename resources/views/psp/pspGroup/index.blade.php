@extends('app')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Grupos</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="{{route('pspGroup.create')}}">
            {{Form::button('<i class="fa fa-plus"></i> Crear Grupo',['class'=>'btn btn-success pull-right'])}}
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grupos</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                    <thead> 
                        <tr class="headings"> 
                            <th>Numero</th> 
                            <th>Observacion</th> 
                            <th>Curso</th>
                            <th colspan="2">Acciones</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach($pspGroups as $pspGroup)
                        <tr> 
                            <td>{{$pspGroup->numero}}</td> 
                            <td>{{$pspGroup->descripcion}}</td> 
                            <td>{{$pspGroup->Nombre}}</td>
                            <td>
                                <a href="{{route('pspGroup.edit', $pspGroup->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-pencil"></i></a>
                                <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$pspGroup->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr> 

                        @include('modals.delete', ['id'=> $pspGroup->id, 'message' => '¿Esta seguro que desea eliminar este grupo?', 'route' => route('pspGroup.delete', $pspGroup->id)])
                        @endforeach
                        
                    </tbody> 
                </table>
                {{$pspGroups->links()}}
            </div>
        </div>
    </div>
</div>
@endsection