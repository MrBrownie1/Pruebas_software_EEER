<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Personaje.php';
    
    $cliente = cliente::recuperarTodos();
    
    require_once 'vistas/index.php';
    
?>