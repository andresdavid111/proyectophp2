<?php
  class Usuario{
    public function index(){
      $rows = NULL;
      $contador = 0;
  		$modelo = new Conexion();
  		$conexion = $modelo->getConexion();
  		$sql = "SELECT * FROM usuarios2";
  		$statement = $conexion->prepare($sql);
  		$statement->execute();
        
        
        $tamano_paginas = 3;
      $pagina = 1;
     
      if(isset($_GET["pagina"]))
      {
        if($_GET["pagina"]==1)
        {
            
        }else{
          $pagina = $_GET["pagina"];
        }
      }else{
        $pagina=1;
      }
        
    
      $empezar_desde = (($pagina-1)*$tamano_paginas);
      $num_filas = $statement->rowcount();
      $total_paginas = ceil($num_filas/$tamano_paginas);
      echo "<p><hr></p>";
      echo  "<div  text-align:center;'>";
      if($pagina>=2)
      {
        echo " <a href='?pagina=1'>Primero</a>|";
        $url = "?pagina=".($pagina-1);
        echo " <a href='".$url."'>Anterior</a>";
      }
      for($i=1;$i<=$total_paginas;$i++)
      {
        echo " <a href='?pagina=".$i."'>".$i."</a> -";
      }
      if($pagina < ($total_paginas))
      {
        echo "<a href='?pagina=".($pagina+1)."'>Siguiente</a> -";
        echo "<a href='?pagina=".($total_paginas)."'>Ultimo</a>  -";
      }
       echo "</div><br>";
       
        
      
      $sql_limit = "SELECT * FROM usuarios2 LIMIT $empezar_desde,$tamano_paginas";
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
      
      
    public function store($nombre,$email,$password, $foto){
      $modelo = NEW Conexion();
      $conexion = $modelo->getConexion();
      $sql = "INSERT INTO usuarios2(nombre_usuario,email,password, foto) VALUES(:nombre,:email,:password, :foto)";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(':nombre',$nombre);
      $statement->bindParam(':email',$email);
      $statement->bindParam(':password',$password);
      $statement->bindParam(':foto',$foto);
      if(!$statement){
        return "Error al crear el Usuario";
      }else{
        $statement->execute();
        return "Usuario creado correctamente";
      }
    }
      
      
    public function show($id){
  		$modelo = new Conexion();
  		$conexion = $modelo->getConexion();
  		$sql = "SELECT * FROM usuarios2 WHERE id = :id";
  		$statement = $conexion->prepare($sql);
  		$statement->bindParam(':id',$id);
  		$statement->execute();
  		$resultado= $statement->fetchAll();
  		return $resultado;
  	}
      
      
    public function update($id, $nombre,$email,$password, $foto){
      $modelo = NEW Conexion();
      $conexion = $modelo->getConexion();
      $sql = "UPDATE usuarios SET nombre_usuario = :nombre, email = :email, password = :password, foto = :foto
              WHERE id = :id";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(':id',$id);
      $statement->bindParam(':nombre',$nombre);
      $statement->bindParam(':email',$email);
      $statement->bindParam(':password',$password);
      $statement->bindParam(':foto', $foto);
      if(!$statement){
        return "Error al actualizar el Usuario";
      }else{
        $statement->execute();
        return "Usuario modificado correctamente";
      }
    }
      
      
    public function delete($id){
      $modelo = new Conexion();
  		$conexion = $modelo->getConexion();
  		$sql = "DELETE FROM usuarios2 WHERE id=:id";
  		$statement = $conexion->prepare($sql);
  		$statement->bindParam(':id', $id);
  		if(!$statement){
  			return "Error al eliminar el Usuario";
  		}else{
  			$statement->execute();
  			return "Usuario eliminado correctamente";
  		}
    }
      
      
      
    public function search($nombre){
      $contador = 0;
      $modelo = NEW Conexion();
      $conexion = $modelo->getConexion();
      $sql = "SELECT * FROM usuarios2 WHERE nombre_usuario LIKE ?";
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