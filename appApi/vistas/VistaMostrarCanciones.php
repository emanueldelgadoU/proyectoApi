<?php

class VistaMostrarCanciones {

    public static function render() {
     
      require_once('./vendor/autoload.php');
      include('./header.php');
      
      $client = new \GuzzleHttp\Client();
      
      
      $response = $client->request('GET', 'http://node:3000/api/cancion', [
        'body' => '',
        'headers' => [
          'Authorization' => $_SESSION['tok'],
          'accept' => 'application/json',
          'content-type' => 'application/json',
        ],
      ]);

      $respuesta = $response->getBody();
      
      $respuestaJSON = json_decode($respuesta);

      echo "<table class='table table-dark table-bordered text-center' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
      //Cabecera
      echo "<tr>";
      echo "<th> TITULO </th>";
      echo "<th> GRUPO MUSICAL </th>";
      echo "<th> DURACION </th>";
      echo "<th> ANIO </th>";
      echo "<th> GENERO </th>";
      echo "<th> PUNTUACION </th>";
      echo "<th> VOTAR </th>";
      echo "<th> BOTON </th>";
      echo "</tr>";
  
  
      //Contenido
      foreach ($respuestaJSON as $cancion) {
          echo "<tr>

          <td> $cancion->titulo </td>
          <td> $cancion->grupoMusical </td>
          <td> $cancion->duracion </td>
          <td> $cancion->anio</td>
          <td> $cancion->genero</td>
          <td> $cancion->puntuacion</td>
          
          <form>
          <input type='hidden' name='idCancion' value='$cancion->_id'>
          
          <td>
          <input type='hidden' name='numero' value='0'>
          <input id='radio1' type='radio' name='numero' value='1'>
          <input id='radio2' type='radio' name='numero' value='2'>
          <input id='radio3' type='radio' name='numero' value='3'>
          <input id='radio4' type='radio' name='numero' value='4'>
          <input id='radio5' type='radio' name='numero' value='5'>
          </td>

          <td>
          <input type='hidden' name='accion' value='modificarCancion'>
          <input type='submit' class='btn btn-warning'>  
          </td>

          </form>


          </tr>";
      }
      echo "</table>";

      



      include('./footer.php');

    }


    public static function renderTop() {
     
      require_once('./vendor/autoload.php');
      include('./header.php');
      
      $client = new \GuzzleHttp\Client();
      
      
      $response = $client->request('GET', 'http://node:3000/api/cancion/musica/limite10', [
        'body' => '',
        'headers' => [
          'Authorization' => $_SESSION['tok'],
          'accept' => 'application/json',
          'content-type' => 'application/json',
        ],
      ]);

      $respuesta = $response->getBody();
      
      $respuestaJSON = json_decode($respuesta);

      echo "<table class='table table-dark table-bordered text-center' style='font-size: 15px;align-items: center;' id='dataTable' width='100%' cellspacing='0'>";
      //Cabecera
      echo "<tr>";
      echo "<th> TITULO </th>";
      echo "<th> GRUPO MUSICAL </th>";
      echo "<th> DURACION </th>";
      echo "<th> ANIO </th>";
      echo "<th> GENERO </th>";
      echo "<th> PUNTUACION </th>";
      echo "<th> VOTAR </th>";
      echo "<th> BOTON </th>";
      echo "</tr>";
  
  
      //Contenido
      foreach ($respuestaJSON as $cancion) {
          echo "<tr>

          <td> $cancion->titulo </td>
          <td> $cancion->grupoMusical </td>
          <td> $cancion->duracion </td>
          <td> $cancion->anio</td>
          <td> $cancion->genero</td>
          <td> $cancion->puntuacion</td>
          
        
          <form>
          <input type='hidden' name='idCancion' value='$cancion->_id'>
          
          <td> 
          <input type='hidden' name='numero' value='0'>
          <input id='radio1' type='radio' name='numero' value='1'>
          <input id='radio2' type='radio' name='numero' value='2'>
          <input id='radio3' type='radio' name='numero' value='3'>
          <input id='radio4' type='radio' name='numero' value='4'>
          <input id='radio5' type='radio' name='numero' value='5'>
          </td>

          <td>
          <input type='hidden' name='accion' value='modificarCancionTop'>
          <input type='submit' class='btn btn-warning'>  
          </td>

          </form>
         
        
          </tr>";
      }
      echo "</table>";

      



      include('./footer.php');

    }

  }

?>