@extends('app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Lista de Grupos de Investigación</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a href="{{route('grupo.create')}}">
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
                        <th>Código </th>
                        <th>Nombre </th>
                        <th>Lider </th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->nombre }}</td>
                            <td>{{ $group->leader->Nombre}} {{ $group->leader->ApellidoPaterno}} {{ $group->leader->ApellidoMaterno}}</td>
                            <td>
                                <a href="{{route('grupo.show',$group->id)}}" class="btn btn-primary btn-xs view-group""><i class="fa fa-search"></i></a>
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$group->id}}"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $group->id, 'message' => '¿Esta seguro que desea eliminar este grupo?', 'route' => route('grupo.delete', $group->id)])
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection