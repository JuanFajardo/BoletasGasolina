<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>G.A.M.P. - @yield('title')</title>
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/custom-styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/js/Lightweight-Chart/cssCharts.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        @include('profile')
        @include('menu')
		<div id="page-wrapper">
		  <div class="header">
        <h1 class="page-header">
          @yield('ventana') a<small>@yield('descripcion')n</small>
        </h1>
		  </div>
      <div id="page-inner">
        <div class="row">
				  <div class="col-md-12">
					  <div class="panel panel-default">
						  <div class="panel-heading">
							@yield('titulo')
						</div>
						<div class="panel-body">
							@yield('cuerpo')
						</div>
					 </div>
					</div>
        </div>
				<footer><p>Soportado por: <a href="http://potosi.bp">WebThemez. Gobierno Autonomo Municipal de Potosí - {{date('Y')}}</a></p> </footer>
      </div>
    </div>
  </div>
  <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
  <script src="{{asset('assets/js/morris/raphael-2.1.0.min.js')}}"></script>
  <script src="{{asset('assets/js/morris/morris.js')}}"></script>
	<script src="{{asset('assets/js/easypiechart.js')}}"></script>
	<script src="{{asset('assets/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('assets/js/Lightweight-Chart/jquery.chart.js')}}"></script>
  <script src="{{asset('assets/js/custom-scripts.js')}}"></script>
  @yield('js')
</body>
</html>
