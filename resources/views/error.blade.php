<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error404</title>

  <!-- Bootstrap core CSS -->
  <link href="{!! asset('error/bootstrap.min.css')!!}" rel="stylesheet">
  <!--external css-->
  <link href="{!! asset('error/font-awesome.css')!!}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{!! asset('error/style.css')!!}" rel="stylesheet">
  <link href="{!! asset('error/style-responsive.css')!!}" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3 p404 centered">
        <img src="../../error/img/404.png" alt="">
        <h1>ESPERA..!!</h1>
        <h3>La pagina que buscas no existe.</h3>
        <br>
        <h5 class="mt">Oye, quizás te interesen estas páginas.</h5>
        <p><a href="{{url('principal')}}">Inicio</a> | <a href="#">Facebook</a>
      </div>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{!! asset('error/jquery.min.js')!!}"></script>
  <script src="{!! asset('error/bootstrap.min.js')!!}"></script>
</body>

</html>
