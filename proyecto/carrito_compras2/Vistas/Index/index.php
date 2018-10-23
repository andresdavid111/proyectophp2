<?php
  require_once '../../Modelos/Session.php';
  require_once '../../Controladores/SessionController.php';
  validar_session();
  if(isset($_GET['salir'])){
    $salir = $_GET['salir'];
    if($salir){
      salir();
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
      h3{
        color: #FFFF;
      }
      
    </style>




    </head>
    <body>






      <!-- navbar 1 -->
      <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="#">
              <img src="../../Public/imagenes/img/fondo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
              COMPUTRONIC E.M.G
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <ul class="navbar-nav mr-auto">
                <!-- espaciado -->
              </ul>
              <ul class="navbar-nav">
                <li class="nav-link" >
                  <a href="index.php">
                     
                    <i class="fas fa-redo-alt" style="color:RGB(2, 158, 212);"></i>
                  </a>
                </li>
                <!-- funciones    -->
                <li class="nav-link dropdown nav-item">
                  <a class="dropdown" data-toggle="dropdown" href="#">
                      
                    
                    <i class="fas fa-chevron-circle-down" style="color:RGB(2, 158, 212);"></i><i class="fa fa-caret-down" style="color:RGB((2, 158, 212));"></i>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a href="../Usuario/index.php" class="dropdown-item" id=""><i class="fas fa-user-tie" style="color:RGB(2, 158, 212);"></i> Usuarios</a>
                    <a href="../Producto/index.php" class="dropdown-item" id=""><i class="fas fa-cart-plus" style="color:RGB(2, 158, 212);"></i> Productos</a>
                    <a href="index.php?salir=true" class="dropdown-item"><i class="fas fa-sign-out-alt" style="color:RGB(2, 158, 212);"></i> Cerrar Sesi&oacute;n</a>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
         </nav>
      </div>
      <div class="container" style="margin-top: 6%;">
        <h3>Bienvenido Administrador</h3>
        


        <div class="row" style="margin-top:2%;">
         <div class="col-sm-6">
           <div class="card">
             <div align="center">
               <img class="card-img-top" src="../../Public/imagenes/img/usuario.png" alt="Card image cap" style="max-width: 50%;">
               <div class="card-body">
                 <h5 class="card-title">Usuarios</h5>
                 <p class="card-text">Listar, modificar, eliminar y buscar <strong>usuarios</strong></p>
                 <a href="../Usuario/index.php" class="btn btn-primary">Informacion</a>
               </div>
             </div>
           </div>
         </div>
         <div class="col-sm-6">
           <div class="card">
             <div align="center">
               <img class="card-img-top" src="../../Public/imagenes/img/producto.png" alt="Card image cap" style="max-width: 85%; height: 43vh;">
               <div class="card-body">
                 <h5 class="card-title">Productos</h5>
                 <p class="card-text">Listar, modificar, eliminar y buscar <strong>Productos</strong></p>
                 <a href="../Producto/index.php" class="btn btn-primary">Informacion</a>
               </div>
             </div>
           </div>
         </div>
       </div>

      </div>

        <!-- Incluir Jquery -->
      	<script src="../../public/js/jquery.min.js"></script>
      	<!-- Incluir Bootstrap -->
      	<script src="../../public/js/bootstrap.min.js"></script>
      	<!-- Incluir Fontawesome -->
      	<script src="../../public/js/fontawesome.min.js"></script>
    </body>
  </html>