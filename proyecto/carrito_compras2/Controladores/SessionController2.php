<?php

  if(isset($_POST['email']) && isset($_POST['pass'])){
    require_once '../Modelos/Conexion.php';
    require_once '../Modelos/Session2.php';
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    validar_user($email, $pass);
      
  }

  function validar_user($email, $pass){
    $session = NEW Session();
  	$resultado = $session->control($email, $pass);
    if($resultado){
      header('Location: ../Vistas/index/index2.php');
    }else{
      header('Location: ../Vistas/index/login2.php?estado=0');
        
    }
  }


  function validar_session(){
    $session = NEW Session();
    $resultado = $session->security();
    if(!$resultado){
      header('Location: login2.php');
    }
  }


  function salir(){
    $session = NEW Session();
    $session->exit();
    header('Location: login2.php');
  }
 ?>