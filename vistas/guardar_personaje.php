<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Guardar  </title>
        <link rel="stylesheet" type="text/css" href="css/pantalla2.css">
    </head>
    <body>
        <h1> Guardar  </h1>
        <form method="post" action="guardar_personaje.php">
            <label for="name"> Nombre </label>
            <br />
            <input type="text" name="nombre" id="nombre" value="<?php echo $cliente->getNombre() ?>" required />
            <br />       
            <label for="name"> Usuario </label>
            <br />
            <input type="text" name="usuario" id="usuario" value="<?php echo $cliente->getUsuario() ?>" required />
            <br />          
            <label for="name"> Correo </label>
            <br />
            <input type="text" name="correo" id="correo" value="<?php echo $cliente->getCorreo() ?>" required />
            <br />          
            <label for="name"> Password </label>
            <br />
            <input type="text" name="password" id="password" value="<?php echo $cliente->getPassword() ?>" required />
            <br />          
                   
            <?php if ($cliente->getId()): ?>
                <input type="hidden" name="cliente_id" value="<?php echo $cliente->getId() ?>" />
            <?php endif; ?>
            <input type="submit" value="Guardar" />
            <a href="index.php"> Cancelar </a>
        </form>
    </body>
</html>