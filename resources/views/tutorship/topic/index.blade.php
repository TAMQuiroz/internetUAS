@extends('app')
@section('content')

<ul class="tabs-page">
    <a href="{{route('parametro.index.duration')}}">
        <div class="tab-page-wrapper">
            <li class="tab-page">Citas</li>
        </div>
    </a>
    <div class="tab-page-wrapper active">
        <li class="tab-page">Temas</li>
    </div>
    <a href="{{route('motivo.index')}}">
        <div class="tab-page-wrapper">
            <li class="tab-page">Motivos</li>
        </div>
    </a>
</ul>
<div class="tab-content-container">

    <div class="page-title">
        <div class="">
            <h3>Temas de Citas</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title"> 
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('tema.create') }}" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i> Nuevo Tema</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <col width="10%" >
                        <col width="75%" >
                        <col width="15%">
                        <thead>
                            <tr class="headings">
                                <th class="centered column-title">Código </th>
                                <th class="column-title">Nombre </th>
                                <th class="centered column-title last">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topics as $topic)
                            <tr class="even pointer">
                                <td hidden class="group-id">{{ $topic->id }}</td>
                                <td class="centered ">{{ $topic->id }}</td>
                                <td class=" ">{{ $topic->nombre }}</td>                            
                                <td class="centered ">
                                    <a title="Editar" href="{{route('tema.edit',$topic->id)}}" class="btn btn-primary btn-xs view-group"">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a title="Eliminar" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$topic->id}}">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('modals.delete', ['id'=> $topic->id, 'message' => '¿Está seguro que desea eliminar este tema?', 'route' => route('tema.delete', $topic->id)])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection