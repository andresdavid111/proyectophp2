<?php 

class Conexion{
    

	public function getConexion(){
		$usuario = 'root';
        
		$contrasena = 'root';
        
		$base_datos = 'carrito_compras';
        
		$host = '127.0.0.1';
        
		$conexion = new PDO('mysql:host=localhost:3306;dbname=carrito_compras;', $usuario, $contrasena);
        
		return $conexion;
	}

}
