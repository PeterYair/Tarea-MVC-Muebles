<?php

require_once '../models/mueble.php';

if (isset($_POST['operacion'])){
  
  $mueble = new Mueble();

  if ($_POST['operacion']=='listarMueble'){

    $datosObtenidos = $mueble->listarMueble();
    if ($datosObtenidos){
    $numeroFila = 1;
      foreach($datosObtenidos as $mueble){
         echo "
          <tr>
            <td>$numeroFila</td>
            <td>{$mueble['nombremueble']}</td>
            <td>{$mueble['categoria']}</td>
            <td>{$mueble['marca']}</td>
            <td>{$mueble['precio']}</td>
            <td>{$mueble['color']}</td>
            <td>
              <a href='#' data-idmueble='{$mueble['idmueble']}' class='editar btn btn-sm btn-primary'><i class='bi bi-pencil'></i></a>        
              <a href='#' data-idmueble='{$mueble['idmueble']}' class='eliminar  btn btn-sm btn-danger' ><i class='bi bi-trash'></i></a>
              </td>
          </tr>
          ";
          $numeroFila++;
      }
    }
  }

}
