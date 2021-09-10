<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class cliente {

    private $id;
    private $nombre;
    private $usuario;
    private $correo;
    private $password;
   

    const TABLA = 'cliente';
    
    public function __construct($nombre=null, $usuario=null, $correo=null, $password=null, $id=null) {
        $this->nombre = $nombre;
        $this->usuario = $usuario; 
        $this->correo = $correo;
        $this->password = $password;    
       $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getUsuario() {
        return $this->usuario;
    }

     public function getCorreo() {
        return $this->correo;
    }

     public function getPassword() {
        return $this->password;
    }


    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


     public function setCorreo($correo) {
        $this->correo = $correo;
    }

 public function setPassword($password) {
        $this->password = $password;
    }


    public function guardar() {
        $conexion = new Conexion();
        if ($this->id) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, usuario = :usuario, correo = :correo, password = :password WHERE id = :id');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':usuario', $this->usuario);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':password', $this->password);
            $consulta->bindParam(':id', $this->id);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, usuario, correo, password) VALUES(:nombre, :usuario, :correo, :password)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':usuario', $this->usuario);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':password', $this->password);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    
    public function eliminar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $this->id);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT nombre, usuario, correo, password FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return new self($registro['nombre'], $registro['usuario'], $registro['correo'], $registro['password'], $id);
        } else {
            return false;
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT id, nombre, usuario, correo, password FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}
