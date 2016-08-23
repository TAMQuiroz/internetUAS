@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Especialidades</h3>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if(in_array(69, Session::get('actions')))
                            <a href="{{ route('new.faculty') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nueva Especialidad</a>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">

                        <th class="column-title">Código</th>
                        <th class="column-title">Nombre</th>
                        <th class="column-title last">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($faculties as $fac)
                        <tr class="odd pointer">
                            <td class="facultyId" hidden="true">@if($fac!=null) {{$fac->IdEspecialidad}} @endif</td>
                            <td class=" ">@if($fac!=null) {{$fac->Codigo}} @endif</td>
                            <td class=" ">@if($fac!=null) {{$fac->Nombre}} @endif</td>
                            <td class=" ">
                                @if(in_array(72, Session::get('actions')))
                                    <a class="btn btn-primary btn-xs" onclick="show('{{$fac->IdEspecialidad}}')" title="Buscar"><i class="fa fa-search"></i></a>
                                @endif

                                @if(in_array(71, Session::get('actions')))
                                    <a class="btn btn-primary btn-xs" title="Editar" href="{{route('edit.faculty', ['facultyId' => $fac->IdEspecialidad])}}"><i class="fa fa-pencil"></i></a>
                                @endif
                                
                                @if(in_array(78, Session::get('actions')))
                                    <a class="btn btn-danger btn-xs delete-faculty" data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="fa fa-remove"></i></a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function show(id){
            $.get(baseUrl+'/faculty/view/' + id , function(data){
                $('#modal-faculty #edit-button').attr("href", baseUrl + "/faculty/edit?facultyId=" + id );
                $('#modal-faculty #faculty-code').html(data.fac.Codigo);
                $('#modal-faculty #faculty-id').html(data.fac.IdEspecialidad);
                $('#modal-faculty #faculty-name').html(data.fac.Nombre);
                $('#modal-faculty #faculty-coordinator').html(data.coordinatorName + " " + data.coordinatorLastName + " " + data.coordinatorSLastName);
                $('#modal-faculty #faculty-desc').html(data.fac.Descripcion);
                $('#modal-faculty').modal();
            });
        }
    </script>
    <script type="text/javascript">
    $('.delete-faculty').on("click", function(event){
        var facultyId = $(this).closest('tr').find('.facultyId').text();
        $('#modal-button').attr("href", baseUrl + "/faculty/delete?facultyId=" + facultyId);
    });
    </script>
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar la especialidad?', 'action' => '#', 'button' => 'Delete'])
    @include('faculty.view-modal', ['title' => 'Faculty #'])
@endsection