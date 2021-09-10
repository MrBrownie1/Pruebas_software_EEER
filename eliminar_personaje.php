<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Personaje.php';
    
    $cliente_id = (isset($_REQUEST['cliente_id'])) ? $_REQUEST['cliente_id'] : null;
    
    if($cliente_id){
        $cliente = cliente::buscarPorId($cliente_id);        
        $cliente->eliminar();
        header('Location: index.php');
    }
    
?>