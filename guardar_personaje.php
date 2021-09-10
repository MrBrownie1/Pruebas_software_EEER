<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Personaje.php';
    
    $cliente_id = (isset($_REQUEST['cliente_id'])) ? $_REQUEST['cliente_id'] : null;
    
    if($cliente_id){        
        $cliente = cliente::buscarPorId($cliente_id);        
    }else{
        $cliente = new cliente();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
        $password = (isset($_POST['password'])) ? $_POST['password'] : null;
        $cliente->setNombre($nombre);
        $cliente->setUsuario($usuario);
        $cliente->setCorreo($correo);
        $cliente->setPassword($password);
        $cliente->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_personaje.php';
    }
    
?>
