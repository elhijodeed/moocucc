<!DOCTYPE html>
<html lang="es" class="no-js">
<!--
clase index.blade.php
@copyright 2015
-->
<head>
	<title>@yield('title', 'MOOC UCC')</title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" >
	<link href="{{URL::to('css/estilo.css')}}" rel="stylesheet">

	<!-- js -->
	<script src= "{{URL::to('js/Chart.js')}}"></script>

	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-71691218-1', 'auto');
	ga('send', 'pageview');
	</script>
</head>

<body class="body_div bg_blue_80">

	<!--Header Start Here-->
	<header>
		<nav class="navbar navbar-default" role="navigation">
			<!-- El logotipo y el icono que despliega el menú se agrupan
			para mostrarlos mejor en los dispositivos móviles -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-ex1-collapse">
					<span class="sr-only">Desplegar navegación</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ URL::route('index') }}" style="padding: 0 15px;"><img src="{{URL::to('imagenes/logo.png')}}" width="50px" style="position:relative; top:6px;"></a>
			</div>

			<!-- Agrupar los enlaces de navegación, los formularios y cualquier
			otro elemento que se pueda ocultar al minimizar la barra -->
			<div class="collapse navbar-collapse navbar-ex1-collapse navbar_back">
				<ul class="nav navbar-nav">
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Session::get('tipo_usuario') == "Administrador")
					<li><a href="{{ URL::route('administrador')}}">Panel Administrador</a></li>
					@endif
					@if (Session::get('user') != "")
					<li><a href="{{ URL::route('chat') }}">Chat</a></li>
					<li><a href="{{ URL::route('mis-badges') }}">Mis Badges</a></li>
					<li><a href="{{ URL::route('mis-cursos') }}">Mis Cursos</a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							{{ Session::get('user') }}<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{ URL::route('usuario', Session::get('user_id') ) }}">Mi Perfil</a></li>
							<li class="divider"></li>
							<li><a href="{{ URL::route('logout')}}">Salir</a></li>
						</ul>
					</li>
					@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
						<ul id="login-dp" class="dropdown-menu">
							<li>
								<div class="row">
									<div class="col-md-12">
										<center>
											Login via
											<div class="social-buttons">
												<a href="{{ URL::route('login-facebook') }}" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a><br><br>
												<a href="{{ URL::route('login-twitter') }}" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a><br><br>
												<a href="{{ URL::route('login-google') }}" class="btn btn-gp"><i class="fa fa-google"></i> Google +</a><br><br>
											</div>
										</center>
									</div>
								</div>
							</li>
						</ul>
					</li>
					@endif
				</ul>
			</div>
		</nav>
	</header>

	<!--
		<div class="container" style="position:relative; top:-30px;">
	-->
	@yield('contenido', '')
	<!--
	</div>
	-->

	<!-- bootstrap - js -->
	<script src= "http://code.jquery.com/jquery-2.2.0.min.js" ></script>
	<script src= "//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<!-- bootstrap - js -->

	<script>

	$(document).ready(function() {
		var track =  "";

		jQuery.ajax({
			url: '../../../obtener-inteligencia',
			success: function (result) {
				track = result;
			},
			async: false
		});

		var sideslider = $('[data-toggle=collapse-side]');
		var sel = sideslider.attr('data-target');
		var sel2 = sideslider.attr('data-target-2');
		sideslider.click(function(event){
			$(sel).toggleClass('in');
			$(sel2).toggleClass('out');
		});




		if("Kinestésico" == track)
		{
			$("#btn_kinestesico").attr("class","btn btn-block btn-info");
			$("#btn_visual").attr("class","btn btn-block btn-primary");
			$("#btn_auditivo").attr("class","btn btn-block btn-primary");

			$("#div_auditivo").show();
			$("#div_visual").show();
		}

		if("Visual" == track)
		{
			$("#btn_kinestesico").attr("class","btn btn-block btn-info");
			$("#btn_visual").attr("class","btn btn-block btn-primary");
			$("#btn_auditivo").attr("class","btn btn-block btn-info");

			$("#div_auditivo").hide();
			$("#div_visual").show();
		}

		if("Lingüístico" == track)
		{
			$("#btn_kinestesico").attr("class","btn btn-block btn-info");
			$("#btn_auditivo").attr("class","btn btn-block btn-primary");
			$("#btn_visual").attr("class","btn btn-block btn-info");

			$("#div_auditivo").show();
			$("#div_visual").hide();
		}

		$("#btn_kinestesico").click(function() {
			$("#btn_kinestesico").attr("class","btn btn-block btn-info");
			$("#btn_visual").attr("class","btn btn-block btn-primary");
			$("#btn_auditivo").attr("class","btn btn-block btn-primary");

			$("#div_auditivo").show();
			$("#div_visual").show();
		});

		$("#btn_visual").click(function() {
			$("#btn_kinestesico").attr("class","btn btn-block btn-info");
			$("#btn_visual").attr("class","btn btn-block btn-primary");
			$("#btn_auditivo").attr("class","btn btn-block btn-info");

			$("#div_auditivo").hide();
			$("#div_visual").show();
		});

		$("#btn_auditivo").click(function() {
			$("#btn_kinestesico").attr("class","btn btn-block btn-info");
			$("#btn_auditivo").attr("class","btn btn-block btn-primary");
			$("#btn_visual").attr("class","btn btn-block btn-info");

			$("#div_auditivo").show();
			$("#div_visual").hide();
		});


		$(".btn_desuscribirse").click(function() {
			var texto_id = $(this).attr('id');
			var texto = (texto_id.substr(12,texto_id.length));

			if (confirm('¿Estas seguro de darte de baja en este curso?')){
				jQuery.ajax({
					url: '../../../desuscribir',
					data: {curso: texto },
					success: function (result) {
							//alert(result);
							window.location="{{URL::to('index')}}";
					},
					async: true
				});
			}

		});



		$(".btn_res").click(function() {
			var texto_id = $(this).attr('id');
			var texto = (texto_id.substr(4,texto_id.length));
			var textos = texto.split("x");
			var leccion = textos[0];
			var pregunta = textos[1];
			var opcion = textos[2];

			$("#btn_"+leccion+"x"+pregunta+"xa").attr("class","btn btn-primary btn_res");
			$("#btn_"+leccion+"x"+pregunta+"xb").attr("class","btn btn-primary btn_res");
			$("#btn_"+leccion+"x"+pregunta+"xc").attr("class","btn btn-primary btn_res");
			$("#btn_"+leccion+"x"+pregunta+"xd").attr("class","btn btn-primary btn_res");
			$(this).attr("class","btn btn-success btn_res");

			$("#r_"+leccion+"x"+pregunta).html(opcion);
		});

		$(".input_res").keyup(function() {
			var texto_id = $(this).attr('id');
			var texto = (texto_id.substr(6,texto_id.length));
			var textos = texto.split("x");
			var leccion = textos[0];
			var pregunta = textos[1];
			var opcion = $(this).val();

			$("#r_"+leccion+"x"+pregunta).html(opcion);
		});

		$("#btn-microforo").click(function() {
			var mensaje = $(".mensaje").val();
			var texto_id = $(".mensaje").attr('id');
			var texto = (texto_id.substr(8,texto_id.length));
			var textos = texto.split("x");
			var clase = textos[0];
			var leccion = textos[1];
			var usuario = "";

			jQuery.ajax({
				url: '../../../postear-en-microforo',
				data: {clase: clase, leccion: leccion, mensaje: mensaje, pregunta: 0 },
				success: function (result) {
					usuario = result;
					location.reload();
				},
				async: true
			});

		});

		$(".responder_microforo").click(function() {
			var texto_id = $(this).attr('id');
			var texto = (texto_id.substr(4,texto_id.length));
			var textos = texto.split("x");
			var clase = textos[0];
			var leccion = textos[1];
			var pregunta = textos[2];
			var mensaje = $("#mensajex"+clase+"x"+leccion+"x"+pregunta).val();

			console.log('clase: '+clase+', leccion: '+leccion+', mensaje: '+mensaje+', preguntarel: '+pregunta )

			jQuery.ajax({
				url: '../../../postear-en-microforo',
				data: {clase: clase, leccion: leccion, mensaje: mensaje, pregunta: pregunta },
				success: function (result) {
					usuario = result;
					location.reload();
				},
				async: true
			});

		});




		$("#btn-microforo-2").click(function() {
			var mensaje = $(".mensaje").val();
			var texto_id = $(".mensaje").attr('id');
			var texto = (texto_id.substr(8,texto_id.length));
			var textos = texto.split("x");
			var clase = textos[0];
			var leccion = textos[1];
			var usuario = "";

			jQuery.ajax({
				url: '../../../../postear-en-microforo',
				data: {clase: clase, leccion: leccion, mensaje: mensaje },
				success: function (result) {
					usuario = result;
					location.reload();
				},
				async: true
			});

		});


		$("#btn_terminar_prueba").click(function() {

			var leccion1 = 0;
			var preguntas = [];
			var respuestas = [];
			var contador = 0;
			var completo = true;
			var curso = $("#curso_div").val();
			$(".result").each(function( i ) {

				var texto_id = $(this).attr('id');
				var texto = (texto_id.substr(2,texto_id.length));
				var textos = texto.split("x");
				var leccion = textos[0];
				var pregunta = textos[1];
				var opcion = $(this).text();

				leccion1 = leccion;
				preguntas[i] = pregunta;
				respuestas[i] = opcion;
				//console.log('cosa '+pregunta+' '+opcion);
				if(opcion == ''){	completo = false;	}
				contador++;
			});
			//console.log("completo: "+completo);
			if(!completo)
			{
				var r = confirm("Aún hay preguntas sin responder, ¿Desea enviar el cuestionario de todos modos?");
				if (r == true) {
					jQuery.ajax({
						url: '../../../validar-quiz',
						data: {leccion: leccion1, preguntas: preguntas, respuestas: respuestas },
						success: function (result) {
							var textos = result.split("x");
							var resultado = textos[0];
							var avance = textos[1];
							alert("Resultado:"+resultado);
							$("#regresar_button").css('visibility', 'visible');
							$("#btn_terminar_prueba").css('visibility', 'hidden');
							if(avance == "si"){ $('#myModal').modal();  }
							else if(avance == "completo"){ $('#myModal2').modal();$('#myModal').modal();  }

						},
						async: false
					});
				}

			}
			else{

				jQuery.ajax({
					url: '../../../validar-quiz',
					data: {leccion: leccion1, preguntas: preguntas, respuestas: respuestas },
					success: function (result) {
						var textos = result.split("x");
						var resultado = textos[0];
						var avance = textos[1];
						alert("Resultado: "+resultado);
						$("#regresar_button").css('visibility', 'visible');
						$("#btn_terminar_prueba").css('visibility', 'hidden');
						if(avance == "si"){ $('#myModal').modal();  }
						else if(avance == "completo"){ $('#myModal2').modal();$('#myModal').modal();  }
					},
					async: false
				});
			}
		});

		$(".btn_res_num").click(function() {
			var texto_id = $(this).attr('id');
			var texto = (texto_id.substr(4,texto_id.length));
			var textos = texto.split("x");
			var leccion = textos[0];
			var pregunta = textos[1];
			var opcion = textos[2];

			$("#btn_"+leccion+"x"+pregunta+"x1").attr("class","btn btn-primary btn_res");
			$("#btn_"+leccion+"x"+pregunta+"x2").attr("class","btn btn-primary btn_res");
			$("#btn_"+leccion+"x"+pregunta+"x3").attr("class","btn btn-primary btn_res");
			$("#btn_"+leccion+"x"+pregunta+"x4").attr("class","btn btn-primary btn_res");
			$(this).attr("class","btn btn-success btn_res");

			$("#r_"+leccion+"x"+pregunta).html(opcion);
		});





		$("#btn_inteligencia").click(function() {

			var preguntas = [];
			var respuestas = [];
			var contador = 0;
			var completo = true;
			var leccion = 0;
			$(".result").each(function( i ) {

				var texto_id = $(this).attr('id');
				var texto = (texto_id.substr(2,texto_id.length));
				var textos = texto.split("x");
				leccion = textos[0];
				var pregunta = textos[1];
				var opcion = $(this).text();

				preguntas[i] = pregunta;

				if(opcion == ''){	completo = false; respuestas[i] = -1;	}
				else{ respuestas[i] = parseInt(opcion)-1; }
				contador++;
			});
			console.log("comienza");

			if(completo){
				for (var i=0; i<(respuestas.length); i++)
				{
					$("#mensaje_"+leccion+"x"+preguntas[i]).html("");
				}
				jQuery.ajax({
					url: '../../../validar-inteligencia',
					data: {preguntas: preguntas, respuestas: respuestas },
					success: function (result) {
						console.log(result);
						$("#regresar").css('visibility', 'visible');
						$("#btn_inteligencia").css('visibility', 'hidden');

						alert("Resultado: "+result);

					},
					async: true
				});

			}
			else
			{
				alert("Aún tienes preguntas sin responder, por favor respóndelas todas");
				for (var i=0; i<(respuestas.length); i++)
				{
					$("#mensaje_"+leccion+"x"+preguntas[i]).html("");
					if(respuestas[i] == -1)
					{
						$("#mensaje_"+leccion+"x"+preguntas[i]).html("Pregunta sin responder");
					}
				}
			}

		});

		var ctx = $("#myChart").get(0).getContext("2d");
		var ctx2 = $("#myChart2").get(0).getContext("2d");
		var ctx3 = $("#myChart3").get(0).getContext("2d");
		var ctx4 = $("#myChart4").get(0).getContext("2d");

		var ctx = document.getElementById("myChart").getContext("2d");
		var ctx2 = document.getElementById("myChart2").getContext("2d");
		var ctx3 = document.getElementById("myChart3").getContext("2d");
		var ctx4 = document.getElementById("myChart4").getContext("2d");


		jQuery.ajax({
			url: '../../../obtener-inscritos',
			data: {curso: $("#datas").val() },
			success: function (result) {
				var myBarChart = new Chart(ctx).Pie(result, {});
			},
			async: false
		});

		jQuery.ajax({
			url: '../../../obtener-demografia',
			data: {curso: $("#datas").val() },
			success: function (result) {
				var myBarChart2 = new Chart(ctx2).Pie(result, {});
				drawTable(result, "CiudadDataTable", "Ciudad");
			},
			async: false
		});

		jQuery.ajax({
			url: '../../../obtener-demografia-pais',
			data: {curso: $("#datas").val() },
			success: function (result) {
				var myBarChart3 = new Chart(ctx3).Pie(result, {});
				drawTable(result, "PaisDataTable", "Pais");
			},
			async: false
		});

		jQuery.ajax({
			url: '../../../obtener-inscritos-universidad',
			data: {curso: $("#datas").val() },
			success: function (result) {
				var myBarChart4 = new Chart(ctx4).Pie(result, {});
				drawTable(result, "UniversidadDataTable", "Universidad");
			},
			async: false
		});

		function drawTable(data, table, demografia) {
			var row = $("<tr />")
			$("#"+table).append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<th>"+demografia+"</th>"));
			row.append($("<th>Cantidad</th>"));
			for (var i = 0; i < data.length; i++) {
				drawRow(data[i], table);
			}
		}

		function drawRow(rowData, table) {
			var row = $("<tr />")
			$("#"+table).append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
			row.append($("<td>" + rowData.label + "</td>"));
			row.append($("<td>" + rowData.value + "</td>"));
		}

	});

	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});


	</script>

</body>

</html>
