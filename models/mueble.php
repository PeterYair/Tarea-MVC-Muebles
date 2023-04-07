<?php

require_once "Conexion.php";

class Mueble extends Conexion{

  private $accesoBD;

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  public function listarMueble(){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_mueble_listar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function registrar($datos= []){
    try{

      $consulta = $this->accesoBD->prepare("CALL spu_mueble_registrar(?, ?, ?, ?, ?)");

      $consulta->execute(
        array(
          $datos["nombremueble"],
          $datos["categoria"],
          $datos["marca"],
          $datos["precio"],
          $datos["color"]
        )
        );
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function eliminar($idmueble = 0){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_muebles_eliminar(?)");
      $consulta->execute(array($idmueble));
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }



}
