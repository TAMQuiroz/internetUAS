@extends('app')
@section('content')


<div class="row">
	<div class="col-md-12">
		<div class="page-title">
	        <div class="title_left">
	            <h3>Lista de Tipos de Status</h3>
	        </div>
	    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h3 class="panel-title">Status</h3>
			</div>
		  	<div class="panel-body">
				<table class="table table-striped responsive-utilities jambo_table bulk_action"> 
					<thead> 
						<tr class="headings"> 
							<th>Nombre</th> 
							<th colspan="2">Acciones</th>
						</tr> 
					</thead> 
					<tbody> 
						@foreach($tipos as $key => $status)
						<tr> 
							<td>{{$status}}</td> 
							<td>
								<a href="{{route('status.index', $key)}}" class="btn btn-primary btn-xs" title="Visualizar"><i class="fa fa-search"></i></a>
							</td>
						</tr> 

						@endforeach
						
					</tbody> 
				</table>
		  	</div>
		</div>
    </div>
</div>


@endsection