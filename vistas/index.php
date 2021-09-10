<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title> Lista de clientes </title>
         <link rel="stylesheet" type="text/css" href="css/reproductor.css">
    </head>
    <body>
        <h1> Clientes </h1>
        <p> <a href="guardar_personaje.php"> Crear nuevo Cliente </a> </p>
        <?php if (count($cliente) > 0): ?>
            <ul>
                <?php foreach ($cliente as $item): ?>
                <li> 
                    <p> <?php echo $item['id'] . ' - ' .  $item['nombre'] . ' - ' . $item['usuario'] . ' - ' . $item['correo'] . ' - ' . $item['password']; ?>  </p>
                    <p> 
                        <a href="guardar_personaje.php?cliente_id=<?php echo $item['id'] ?>"> Editar </a> 
                        |
                        <a href="eliminar_personaje.php?cliente_id=<?php echo $item['id'] ?>"> Eliminar </a> 
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p> No hay no existe animales para mostrar </p>
        <?php endif; ?>
    </body>
</html>