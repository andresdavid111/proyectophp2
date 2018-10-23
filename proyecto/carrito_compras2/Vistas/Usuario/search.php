<?php @session_start();
  if($_SESSION["AUTENTICA"] != 'SI'){
    header('Location: ../Index/index.php?salir=true');
  }else{
    require_once '../../Modelos/Conexion.php';
    require_once '../../Modelos/Usuario.php';
    require_once '../../Controladores/UsuarioController.php';
  }
 ?>

 <!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <title>Usuarios</title>

        <!-- Incluir Bootstrap -->
     <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
     <!-- Incluir Fontawesome -->
     <link rel="stylesheet" href="../../public/css/fontawesome.min.css" />
    </head>

    <body>

      <!-- navbar 1 -->
     <div class="fixed-top">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container">
           <a class="navbar-brand" href="#">
             
           </a>
           <div id="navbarNavDropdown" class="navbar-collapse collapse">
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
                   </ul>
                </li>
                </ul>

             </div>
           <!-- boton del collapse -->
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
         </div>
        </nav>
     </div>


     <!-- contenido pagina -->
     <div id="page-wrapper">
       <div class="container" style="margin-top: 8%;">
         <div class="header">
           <h1>Resultado Busqueda de Usuarios</h1>
           <a href="index.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</a>

           <form action="search.php"  type="POST" class="form-inline" style="float: right;">
             <input  type="search" placeholder="Nombre Usuario" aria-label="Search" name="nombre_buscar">
             <button type="submit" id="buscar"><i class="fa fa-search fa-fw"></i></button>
           </form>


         </div>
         <section style="margin-top:2%;">
           <table class="table table-bordered table-sm" style="text-align: center;">
             <tr>
               <th>Id</th>
               <th>Nombre</th>
               <th>Descripción</th>
               <th>Foto</th>
             </tr>
             <?php
             if(isset($_REQUEST['nombre_buscar'])){
               $nombre = $_REQUEST['nombre_buscar'];
               search($nombre);
             }else{
               echo "<div class='alert alert-success' style='margin-top: 2%;'><fieldset>No hay parametros de busqueda</fieldset></div>";
             }
             if(isset($_GET['respuesta'])){
               $res = $_GET['respuesta'];
               echo "<div class='alert alert-success' style='margin-top: 2%;'><fieldset>".$res."</fieldset></div>";
             }
             ?>
           </table>
         </section>
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