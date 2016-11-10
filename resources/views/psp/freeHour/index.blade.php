@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Disponibilidad</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="{{route('freeHour.create')}}">
            {{Form::button('<i class="fa fa-plus"></i> Nueva Disponibilidad',['class'=>'btn btn-success pull-right'])}}
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Disponibilidad</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                    <thead> 
                        <tr class="headings"> 
                            <th>Fecha</th>
                            <th>Hora</th>                             
                            <th colspan="2">Acciones</th>
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach($freeHours as $freeHour)
                        <tr> 
                            <td>{{$freeHour->fecha}}</td>
                            <td>{{$freeHour->hora_ini}}:00 horas</td>                             
                            <td>
                            
                                <a href="{{route('freeHour.edit', $freeHour->id)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-pencil"></i></a>
                                <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$freeHour->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                                            
                            </td>
                        </tr> 

                        @include('modals.delete', ['id'=> $freeHour->id, 'message' => '¿Esta seguro que desea eliminar esta disponibilidad?', 'route' => route('freeHour.delete', $freeHour->id)])
                        @endforeach
                        
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>

@endsection