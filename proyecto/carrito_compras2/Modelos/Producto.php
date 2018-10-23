<?php
  /**
   * Metodos de la clase producto
   */
  class Producto{
    public function index(){
      $rows = NULL;
      $contador = 0;
      $modelo = NEW Conexion();
      $conexion = $modelo->getConexion();
        
        
      $sql = "SELECT * FROM productos";
      $statement = $conexion->prepare($sql);
      $statement->execute();
        
        
              $tamano_paginas = 3; //Numero de registros por pagina
      $pagina = 1;      //Pagina principal
      if(isset($_GET["pagina"])){
        if($_GET["pagina"]==1)
        {
          
        }else{
          $pagina = $_GET["pagina"];
        }
      }else{
        $pagina=1;
        
      }
        
      $empezar_desde =(($pagina-1 )*$tamano_paginas); //registro desde el que se empieze dependiendo de la pagina;
      $num_filas = $statement->rowcount(); //Saber el total de registros
      $total_paginas =ceil($num_filas / $tamano_paginas);// redondea el resultado.
      //$posicion = (int)$_GET['pagina'];
      
      echo "<p><hr></p>";
      echo  "<div  text-align:Center;'>";
      if($pagina>=2)
      {
        echo " <a href='?pagina=1'>Primero</a>  -";
        $url = "?pagina=".($pagina-1);
        echo " <a href='".$url."'>Anterior</a>";
      }
       for($i=1;$i<=$total_paginas;$i++)
      {
        echo " <a href='?pagina=".$i."'>".$i."</a>  -";
      }
      if($pagina < ($total_paginas))
      {   
       
        echo "<a href='?pagina=".($pagina+1)."'>Siguiente</a>  - ";
        echo "<a href='?pagina=".($total_paginas)."'>Ultimo</a>  -";
      }
       echo "</div><br>";
        
       
      
      $sql_limit = "SELECT * FROM productos LIMIT $empezar_desde,$tamano_paginas";
      $statement = $conexion->prepare($sql_limit);
      $statement->execute();
        
        
        
      while($resultado = $statement->fetch()){
        $contador +=1;
  			$rows[] = $resultado;
  		}
      if ($contador == 0) {
        return false;
      }else{
        return $rows;
      }
    }
      
      
    public function store($nombre, $descripcion, $foto, $valor){
      $modelo = new Conexion();
  		$conexion = $modelo->getConexion();
  		$sql = "INSERT INTO productos(nombre,descripcion,foto,valor) VALUES(:nombre,:descripcion,:foto,:valor)";
  		$statement = $conexion->prepare($sql);
  		$statement->bindParam(':nombre',$nombre);
  		$statement->bindParam(':descripcion',$descripcion);
  		$statement->bindParam(':foto',$foto);
  		$statement->bindParam(':valor',$valor);
  		if(!$statement){
  			return "Error al crear el producto";
  		}else{
  			$statement->execute();
  			return "Producto creado correctamente";
  		}
        
    }
      
      
    public function show($id){
  		$modelo = new Conexion();
  		$conexion = $modelo->getConexion();
  		$sql = "SELECT * FROM productos WHERE id = :id";
  		$statement = $conexion->prepare($sql);
  		$statement->bindParam(':id',$id);
  		$statement->execute();
  		$resultado= $statement->fetchAll();
  		return $resultado;
        }
      
      
      
    public function update($id, $nombre, $descripcion, $foto, $valor){
  		$modelo = NEW Conexion();
  		$conexion = $modelo->getConexion();
  		$sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, foto = :foto, valor =:valor WHERE id=:id";
  		$statement = $conexion->prepare($sql);
  		$statement->bindParam(':nombre', $nombre);
  		$statement->bindParam(':descripcion', $descripcion);
  		$statement->bindParam(':valor', $valor);
  		$statement->bindParam(':foto', $foto);
  		$statement->bindParam(':id', $id);
  		if(!$statement){
  			return "Error al editar el producto";
  		}else{
  			$statement->execute();
  			return "Producto editado correctamente";
  		}
  	}
      
      
   public function delete($id){
		$modelo = new Conexion();
		$conexion = $modelo->getConexion();
		$sql = "delete from productos where id=:id";
		$statement = $conexion->prepare($sql);
		$statement->bindParam(':id', $id);
		$statement->execute();
		if(!$statement){
			return "Error al eliminar el producto";
		}else{
			$statement->execute();
			return "Producto eliminado correctamente";
		}
	}

  	
    public function search($nombre){
      $contador = 0;
      $modelo = NEW Conexion();
      $conexion = $modelo->getConexion();
      $sql = "SELECT * FROM productos WHERE nombre LIKE ?";
      $statement = $conexion->prepare($sql);
      $statement->bindValue(1,"%$nombre%" );
      $statement->execute();
      while($resultado = $statement->fetch()){
        $contador +=1;
        $rows[] = $resultado;
      }
      if ($contador == 0) {
        return false;
      }else{
        return $rows;
      }
    }
  }
 ?>