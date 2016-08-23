


<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs" border="2">
	<thead>
		<tr class="even pointer"> 
			<th class="column-title"> Aspecto </th>
			<th class="column-title"> Criterio </th>
			@if(! $data->get('sources')->isEmpty())
			@foreach($data->get('sources') as $src)								
				<th value="{{ $src->IdFuenteMedicion }}" class="{{$src->IdFuenteMedicion}}">{{ $src->Nombre }} </th> 	
			@endforeach
			@endif
		</tr>
	</thead>
	<tbody > 
		@if(! $data->get('aspects')->isEmpty())
		@foreach($data->get('aspects') as $aspt)
			@foreach($aspt->criterion as $crt)
			<tr class="even pointer"> 
				<td value="{{ $aspt->IdAspecto }}">{{ $aspt->Nombre }} </td> 
				<td value="{{ $crt->IdCriterio }}">{{ $crt->Nombre }} </td> 
				@if(! $data->get('sources')->isEmpty())
				@foreach($data->get('sources') as $src)	
					<?php $temp = ''; ?>
					@if(! $data->get('msrxcrt')->isEmpty())
					@foreach($data->get('msrxcrt') as $msrxcrt)	
						@if($msrxcrt->IdFuenteMedicion ==  $src->IdFuenteMedicion AND $msrxcrt->IdCriterio ==  $crt->IdCriterio)
							<?php $temp = "checked"; ?>    
						@endif
					@endforeach
					@endif	
					<td value="{{ $src->IdFuenteMedicion }}" class="{{$src->IdFuenteMedicion}}">
						<input value="{{$src->IdFuenteMedicion}}-{{$crt->IdCriterio}}" type="checkbox" class="flat" id="stRstCheck" name="stRstCheck[]"  {{ $temp }}>
					</td> 	
				@endforeach
				@endif	
			</tr>
			@endforeach
		@endforeach
		@endif
	</tbody>
</table>   

<script src="{{ URL::asset('js/intranetjs/measurementSource/view-course-script.js')}}"></script>
