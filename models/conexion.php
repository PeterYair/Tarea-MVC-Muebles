<?php

class Conexion{

  private $host = "localhost";  
  private $port = "3306";       
  private $database = "Muebles"; 
  private $charset = "UTF8";    
  private $user = "root";       
  private $password = "";      

  private $pdo;

  private function connectServer(){
    $conexion = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}", $this->user, $this->password);
    return $conexion;
  }

  public function getConexion(){
    try{
      $this->pdo = $this->connectServer();
      
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $this->pdo;
    
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}