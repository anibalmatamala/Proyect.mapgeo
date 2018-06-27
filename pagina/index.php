<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>CRUD con PHP-mariaDB</title>
</head>
<body>
    <!-- begin navbar -->
    <?php include('./inc/navbar.php');?>
    <!-- end navbar -->
    
    <div class="container">
      <h2 class="mt-5 text-uppercase">crud: create, retrieve, update &amp; delete</h2>
      <p class="lead">Agregar, Recuperar, Actualizar y Eliminar: <strong>4 funciones básicas de la persistencia sobre base de datos.</strong></p>
      <dl class="row">
        <dt class="col-2 text-right">API</dt>
        <dd class="col-10">Interfaz de Programación de Aplicación (e.g., procedimentales u orientadas a objetos).</dd>
        <dt class="col-2 text-right">Conector</dt>
        <dd class="col-10">Software que permite a una aplicación conectarse a un servidor de bases de datos.</dd>
        <dt class="col-2 text-right">Driver</dt>
        <dd class="col-10">Software diseñado para comunicarse con un tipo específico de servidor de bases de datos (e.g., MySQL, PostgreSQL)</dd>
        <dt class="col-2 text-right">Extension</dt>
        <dd class="col-10">Permite hacer uso de utilidades mediante código PHP.</dd>
      </dl>

      <h4>Alternativas en PHP</h4>
      <ol>
        <li>PDO: Capa de abstracción de base de datos (capa de persistencia) Objetos de datos de PHP (PDO). No proporciona API.</li>
        <li>MySQL: para MySQL 4.1.3 o inferior.</li>
        <li>MySQLi: MySQL <em>improved</em>, API de PHP (extensión).</li>
      </ol>
    </div>
</body>
</html>