@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Disponibilidad</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('new.freehour') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nueva Disponibilidad</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Reunion <span class="error"> </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select class="form-control col-md-7 col-xs-12" name="hall" id="hall" value="Seleccionar">
                            <option>Seleccionar</option>
                        </select>                                
					</div>
				</div>
                <br>
                <div class="clearfix"></div>
				<div class="form-group">
				<br>
				<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha <span class="error"> </span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="fecha">                              
					</div>
				</div>
                <br>
                <br>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Hora</th>
                        <th class="column-title last">Acciones</th>
                        <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    	<tr class="even pointer">
                            <td width="930" class="">10:00-11:00</td>
                            <td class=" ">
                                    <a href="{{ route('edit.freehour',1) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs delete-teacher" data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection