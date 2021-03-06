@extends ('template2')

@section ('title') Ver Curso {{$curso->nombre}} @stop



@section ('contenido')

<div class="col-sm-3 col-xs-12  bg_blue_80">
	<div class=" espaciado">
		<img class="imagen_div" src="../imagenes/{{$curso->imagen_presentacion}} " >

		<table class="table-curso-detalles">
				<tr>
					<th width="5%"><center><a href="{{ URL::route('ver-curso-info', $curso->id_curso ) }}"><span class="glyphicon glyphicon glyphicon-home" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('ver-curso-info', 'Inicio', array($curso->id_curso), array()) }}</th>
				</tr>
				<tr>
					<th width="5%"><center><a href="{{ URL::route('ver-curso-contenido', $curso->id_curso) }}"><span class="glyphicon glyphicon glyphicon-list" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('ver-curso-contenido', 'Contenido del Curso', array($curso->id_curso), array()) }}</th>
				</tr>
				<tr>
					<th width="5%"><center><a href="{{ URL::route('ver-curso-tareas', $curso->id_curso) }}"><span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('ver-curso-tareas', 'Tareas', array($curso->id_curso), array()) }}</th>
				</tr>
				<tr>
					<th width="5%"><center><a href="{{ URL::route('ver-curso', $curso->id_curso) }}"><span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('ver-curso', 'Información del Curso', array($curso->id_curso), array()) }}</th>
				</tr>
				<tr>
					<th width="5%"><center><a href="#" id="desuscribirx{{$curso->id_curso}}" class="btn_desuscribirse"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></center></a></th>
					<th colspan="3"> <a href="#" id="desuscribirx{{$curso->id_curso}}" class="btn_desuscribirse">Darse de baja</a> </th>
				</tr>
		</table>
	</div>
</div>

<div class="col-sm-9 col-xs-12 div_list2 top_menos_20">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<center><h1> Ver Curso {{$curso->nombre}} </h1></center>
		@foreach ($curso->getTemarios() as $temario)
		<div class="espaciado">
			<h3 class="strong">{{ $temario->titulo }}
				@if($editable)
					{{ HTML::linkRoute('editar-temario-info-curso', 'Editar Mensaje', array($temario->id_temario), array('class' => 'btn btn-primary btn-xs')) }}
			@endif</h3>
			{{ $temario->contenido }}

		</div>
		@endforeach

		<h3 class="strong">Profesores Del Curso</h3>
		@foreach ($curso->getProfesoresAdmin() as $profe)
		<div class="col-md-4 col-sm-6 col-xs-12 espaciado ">
			<center>
				<h4 class="strong">Docente Principal</h4>

				@if(substr( $profe->getProfesor()->foto , 0, 4) == 'http')
				<img class="imagen_redonda" src="{{ $profe->getProfesor()->foto }}" ><br>
				@else
				<img class="imagen_redonda" src="../imagenes/fotos/{{ $profe->getProfesor()->foto  }} " ><br>
				@endif

				<span class="strong">{{ $profe->getProfesor()->nombre." ".$profe->getProfesor()->apellido }}</span><br>
				{{ $profe->getProfesor()->titulo }}<br><br>
			</center>
		</div>
		@endforeach
		@foreach ($curso->getProfesoresAsistentes() as $profe)
		<div class="col-md-4 col-sm-6 col-xs-12 espaciado ">
			<center>
				<h4 class="strong">Docente</h4>

				@if(substr( $profe->getProfesor()->foto , 0, 4) == 'http')
				<img class="imagen_redonda" src="{{ $profe->getProfesor()->foto }}" ><br>
				@else
				<img class="imagen_redonda" src="../imagenes/fotos/{{ $profe->getProfesor()->foto  }} " ><br>
				@endif

				<span class="strong">{{ $profe->getProfesor()->nombre." ".$profe->getProfesor()->apellido }}</span><br>
				{{ $profe->getProfesor()->titulo }}<br><br>
			</center>
		</div>
		@endforeach
	</div>
</div>

@stop
