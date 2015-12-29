@extends ('template2')

@section ('title') Ver Curso @stop


@section ('contenido')

<div class="col-sm-3 col-xs-12  bg_blue_80">
	<div class=" espaciado">
		<img class="imagen_div" src="../../imagenes/{{$curso->imagen_presentacion}} " >

		<table class="table-curso-detalles">
				<tr>
					<th width="5%"><center><a href="{{ URL::route('profesor-base-ver-curso-info', $curso->id_curso ) }}"><span class="glyphicon glyphicon glyphicon-home" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('profesor-base-ver-curso-info', 'Inicio', array($curso->id_curso), array()) }}</th>
				</tr>
				<tr>
					<th width="5%"><center><a href="{{ URL::route('profesor-base-ver-curso-contenido', $curso->id_curso) }}"><span class="glyphicon glyphicon glyphicon-list" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('profesor-base-ver-curso-contenido', 'Contenido del Curso', array($curso->id_curso), array()) }}</th>
				</tr>
				<tr>
					<th width="5%"><center><a href="{{ URL::route('profesor-base-ver-curso-tareas', $curso->id_curso) }}"><span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('profesor-base-ver-curso-tareas', 'Tareas', array($curso->id_curso), array()) }}</th>
				</tr>
				<tr>
					<th width="5%"><center><a href="{{ URL::route('profesor-base-ver-curso', $curso->id_curso) }}"><span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span></center></a></th>
					<th colspan="3">{{ HTML::linkRoute('profesor-base-ver-curso', 'Información del Curso', array($curso->id_curso), array()) }}</th>
				</tr>
		</table>
	</div>
</div>

<div class="col-sm-9 col-xs-12 div_list2 top_menos_20">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<br/>
		<h2 class="strong"><center>{{ $curso->nombre }}</center></h2>
		<br/>
		@foreach ($curso->getTemariosInicio() as $temario)
<!--
					<div class="">
-->
						<h3 class="strong">{{ $temario->titulo }}</h3>
						<center>
						@foreach ($temario->getProfesores() as $profe)
							
							@if(substr( $profe->getProfesor()->foto , 0, 4) == 'http')
							<img class="imagen_redonda_reducida" src="{{ $profe->getProfesor()->foto }}" >
							@else
							<img class="imagen_redonda_reducida" src="../../imagenes/fotos/{{ $profe->getProfesor()->foto  }} " >
							@endif

						@endforeach
						</center>
						
						{{ $temario->contenido }}
						<br/><br/>
<!--
					</div>
-->
		@endforeach

</div>

@stop
