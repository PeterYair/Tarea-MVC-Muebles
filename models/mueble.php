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



}
