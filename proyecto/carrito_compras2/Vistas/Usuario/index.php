<?php @session_start();
  if ($_SESSION["AUTENTICA"] != 'SI') {
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

      <style media="screen">
      body{
        background: url(../../Public/imagenes/img/fondo.jpg);
      }
      th{
        background-color: #FFFF;
      }
      tr{
       background-color: #FFFF;
      }
      h1{
        color: #ffff;
      }
      form{
        background-color: #FFFF;
      }
      
    </style>

      
     </head>

     <body>
       <!-- navbar 1 -->
       <div class="fixed-top">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <div class="container">
             <a class="navbar-brand" href="#">
               
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
                   <a href="../Index/index.php">
                  
                       
                     <i class="fas fa-arrow-alt-circle-left" style="color:RGB(2, 158, 212);"></i>
                   </a>
                 </li>

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
                   
                   </ul>
                 </li>
               </ul>
             </div>
           </div>
          </nav>
       </div>


      <!-- contenido pagina -->
      <div id="page-wrapper">
        <div class="container" style="margin-top: 7%;">
          <div class="header">
            <h1>Listado de Usuarios</h1>
            <button type="button" class="btn btn-primary" id="Add"><i class="fa fa-plus-circle"></i> Añadir Nuevo Usuario</button>

            <form action="search.php"  type="POST" class="form-inline" style="float: right;">
              <input type="search" placeholder="Nombre Usuario" aria-label="Search" name="nombre_buscar">
              <button  type="submit" id="buscar"><i class="fas fa-search"></i></button>
            </form>


          </div>
          <section style="margin-top:2%;">
            <table class="table table-bordered table-sm" style="text-align: center;">
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Opciones</th>
              </tr>
              <?php
              if(isset($_GET['respuesta'])){
                $res = $_GET['respuesta'];
                echo "<div class='alert alert-success' style='margin-top: 2%;'><fieldset>".$res."</fieldset></div>";
              }
              index(); ?>
            </table>
          </section>
        </div>
      </div>

      <div class="modal fade" id="ModalContainer" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content" id="ContentModal">

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

  <script type="text/javascript">
    $(document).ready(function () {
      $("#Add").on("click", function () {
        $("#page-wrapper").load('create.php');
      });
    });
    $(document).on("click", "#show", function () {
      var nit = $(this).data("nit");
      var parametros = '&nit='+nit;
      $("#ContentModal").load('show.php?'+parametros,function(){
      });
    });
    $(document).on("click", "#edit", function () {
      var nit = $(this).data("nit");
      var parametros = '&nit='+nit;
      $("#ContentModal").load('edit.php?'+parametros,function(){
      });
    });
  </script>