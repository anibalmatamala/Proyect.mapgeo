<?php
require_once('config/db_connect.php');

if (isset($_GET['msg'])) {
  switch ($_GET['msg']) {
    case 0:
      $msg = '<p class="alert alert-danger">Registro no fue agregado.</p>';
      break;
    case 1:
      $msg = '<p class="alert alert-success">Registro agregado existosamente.</p>';
      break;
    case 2:
      $msg = '<p class="alert alert-success">Registro actualizado exitosamente.</p>';
      break;
    case 3:
      $msg = '<p class="alert alert-success">Registro fue eliminado existosamente.</p>';
      break;
    case 4:
      $msg = '<p class="alert alert-warning">El registro no fue eliminado.</p>';
      break;
    default:
      $msg = '';
      break;
  }
}

$conexion = connect();
$sql = 'SELECT * FROM persona';
/* 
mysqli_query($link, $sql): realiza una consulta a la base de datos. Retorna: 
  - objeto mysqli_result() de resultados obtenidos a partir de la consulta.
  - FALSE en caso de error.
  - TRUE en caso de exito de otra consulta sin retorno de datos.
*/
$result = mysqli_query($conexion, $sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


    <title>CRUD: Recuperar</title>
</head>
<body>
    <!-- begin navbar -->
    <?php include('./inc/navbar.php');?>
    <!-- end navbar -->
    
    <div class="container">
      <h2 class="mt-5 text-uppercase">Recuperar</h2>
      <div class="mt-4 mb-4">
        <a href="agregar.php" class="btn btn-outline-primary">Agregar</a>
      </div>

      <?php
      if (isset($msg)) {
        echo $msg;
      }
      
      if (mysqli_num_rows($result) > 0) {
        # crear tabla
        echo '<table class="table table-sm">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="table-header" >&num; </th>';
        echo '<th class="table-header" >RUT </th>';
        echo '<th class="table-header" >Nombre </th>';
        echo '<th class="table-header" >Apellidos </th>';
        echo '<th class="table-header" >Email </th>';
        echo '<th class="table-header" >Teléfono </th>';
        echo '<th class="table-header" colspan="2" width="10%">Acción</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        /*  
        Imprimir los resultados de la consulta.
          - mysqli_fetch_assoc(): obtiene una fila de resultado como un array asociativo.
        */
        $i = 1;
        while($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $i++ . '</td>';
          echo '<td>' . $row['rut'] . '</td>';
          echo '<td>' . $row['nombre'] . '</td>'; 
          echo '<td>' . $row['apellidos'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['telefono'] . '</td>';
          echo '<td><a href="./editar.php?rut=' . $row['rut']  . '"><i class="fas fa-pencil-alt"></i></a></td>';
          echo '<td><a href="./eliminar.php?rut=' . $row['rut']  . '"><i class="fas fa-eraser"></i></a></td>';
          echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
      } else {
        echo '<p class="alert alert-warning">No hay resultados</p>';
      }
      mysqli_close($conexion);
      ?>
      
    </div>
    
</body>
</html>