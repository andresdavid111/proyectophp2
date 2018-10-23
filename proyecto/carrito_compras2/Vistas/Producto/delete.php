<?php @session_start();
  if($_SESSION["AUTENTICA"] != 'SI'){
    header('Location: ../Index/index.php?salir=true');
  }else{
    require_once '../../Modelos/Conexion.php';
    require_once '../../Modelos/Producto.php';
    require_once '../../Controladores/ProductoController.php';
  }
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Index: Productos</title>
	<!-- Incluir Bootstrap -->
	<link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
	<!-- Incluir Fontawesome -->
	<link rel="stylesheet" href="../../public/css/fontawesome.min.css" />
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>Eliminar Producto</h1>
		</div>
		<section>
			<?php delete(); ?>
			<a href="index.php" class="btn btn-success">Ir Atrás</a>
		</section>
	</div>

	<!-- Incluir Jquery -->
	<script src="../../public/js/jquery.min.js"></script>
	<!-- Incluir Bootstrap -->
	<script src="../../public/js/bootstrap.min.js"></script>
	<!-- Incluir Fontawesome -->
	<script src="../../public/js/fontawesome.min.js"></script>
</body>
</html>