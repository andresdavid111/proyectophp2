<?php
  if (isset($_GET['estado'])) {
    $estado = $_GET['estado'];
    if($estado == 0){
      echo "<div class='alert alert-success'><fieldset> El usuario o la contraseña son incorrectos</fieldset></div>";
    }
  }
 ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>COMPUTRONIC E.M.G</title>

      <!-- Incluir Bootstrap -->
  	<link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
  	<!-- Incluir Fontawesome -->
  	<link rel="stylesheet" href="../../public/css/fontawesome.min.css" />

    <style media="screen">
      body{
        background: url(../../Public/imagenes/img/fondo.jpg);
      }
      form{
        background: #FFFFFF;
        width: 50%;
        max-width: 500px;
        margin-top: 7%;
        padding: 5% 0 5% 6%;
        margin-left: 30%;
      }
      p{
        font-size: 12px;
      }
      label{
        font-size: 20px;
      }
      header {
      border-bottom: 2px solid #eee;
      padding: 20px 0;
      margin-bottom: 10px;
      width: 100%;
      text-align: center;
    }
    header a {
      text-decoration: none;
      color: #FFFFFF;
}
    </style>
  </head>
  <body>
    <header>

    <a href="inicio.php">CATALOGO ONLINE COMPUTRONIC</a>
  </header>

    <div class="container">
      <form action="../../Controladores/SessionController2.php" method="post">
        <fieldset>
          <div class="text-center col-sm-10">
            <legend class="">COMPUTRONIC E.M.G</legend> 
            <legend class="">LOGIN</legend>
            <br />
          </div>

          <div class="form-group">
            <label for="" class="control-label col-sm-2">Usuario</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" placeholder="Nombre de usuario" required id="email">
              
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-sm-2">Contrase&ntilde;a</label>
            <div class="col-sm-10">
              <input type="password" name="pass" class="form-control" placeholder="Contraseña" required >

            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="ingresar"></label>
            <div class="text-center col-sm-10">
              <button type="submit" name="ingresar" class="btn btn-success">Iniciar Sesión</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>


    <!-- Incluir Jquery -->
  	<script src="../../public/js/jquery.min.js"></script>
  	<!-- Incluir Bootstrap -->
  	<script src="../../public/js/bootstrap.min.js"></script>
  	<!-- Incluir Fontawesome -->
  	<script src="../../public/js/fontawesome.min.js"></script>

    <!-- efectos -->
    <script type="text/javascript">
    $(document).ready(function () {
      $('#email').focus();
    });
    </script>
  </body>
</html>