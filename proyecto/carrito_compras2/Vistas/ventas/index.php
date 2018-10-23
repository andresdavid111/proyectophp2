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
<div class="container" style="margin-top: 8%;">
    <h1>Crear pedido</h1>
    <form action="../../Controladores/UsuarioController.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="opcion" value="create">
      <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" required>
      </div>
      <div class="form-group">
        <label for="">direccion</label>
        <input type="text" name="direccion" class="form-control" placeholder="Ingrese tu direccion" required>
      </div>
      <div class="form-group">
        <label for="">email</label>
        <input type="email" name="email" class="form-control" placeholder="Ingrese un email" required>
      </div>
      <div class="form-group">
        <label for="">scaner cedula</label>
        <input type="file" name="foto" class="form-control" required>
      </div>

      <div class="form-group">
        <input type="submit" name="" class="btn btn-success" value="Crear pedido">
        <a href="../usuario/index.php" class="btn btn-primary">Volver</a>
      </div>
    </form>
  </div>
</html>