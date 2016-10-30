@extends('appWithoutHamburger')
@section('content')

	<div class="page-title">
		<div class="title_left">
			<h3>{{ $title }}</h3>
		</div>
	</div>
	<div class="clearfix"></div>

	

	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">

				<div class="x_content">


					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a href="{{ route('academicCycle_create.flujoAdministrador') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nuevo Ciclo Académico</a>
						</div>
					</div>


					<table class="table table-striped responsive-utilities jambo_table bulk_action">
	                    <thead>
		                    <tr class="headings">
		                        <th>Ciclo Académico</th>
		                    </tr>
	                    </thead>
	                    <tbody>
	                         @foreach($academicCycle as $ac)
	                    	<tr>
	                          	<td class="cycleId" hidden="true">{{$ac->IdCicloAcademico}}</td>
	                    		<td>{{$ac->Descripcion}}</td>
	                    		
	                    	</tr>
	                         @endforeach
	                    </tbody>
	                </table>
				</div>

				<br>
				<div class="row"></div>
                <div class="separator"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                         <a  href="{{ route('end.flujoAdministrador') }}" class="btn btn-success pull-right">Siguiente ></a>
                         <a href="{{ route('profesor_index.flujoAdministrador', $id) }}" class="btn btn-default">< Atras</a>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<script src="{{ URL::asset('js/myvalidations/academicCycle.js')}}"></script>

@endsection