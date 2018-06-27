<?php

require('./config/db_connect.php');

if (!empty($_POST)) {
    $conexion = connect();
    /* 
    mysqli_prepare(): prepara una sentencia SQL para su ejecución. Retorna:
        - FALSE si ocurre un error.
        - TRUE si todo ok.
    */
    $sql = 'INSERT INTO persona (rut, nombre, apellidos, email, telefono) VALUES (?, ?, ?, ?, ?)';
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        $rut = $_POST['rut'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        
        # Aqui, se deben agregar las validaciones de los datos.

        /*
        mysqli_stmt_bind_param() agregar variables a una sentencia preparada como parametros.
            - Tipos de datos: {S}tring - {I}nt - {D}ouble.
        */
        mysqli_stmt_bind_param($stmt, 'issss', $rut, $nombre, $apellidos, $email, $telefono);

        /*
        # mysqli_stmt_execute() ejecuta la sentencia preparada: 
            - TRUE en caso de éxito o 
            - FALSE en caso de error. 
            - mysqli_stmt_affected_rows() permite determinar el número total de filas afectadas. 
        */
        if (mysqli_stmt_execute($stmt)) {
            # el registro fue agregado correctamente
            header("Location: recuperar.php?msg=1");
        } else {
            # error al agregar registro
            $msg = '<p class="alert alert-danger">Oops! no fue posible agregar el registro.</p>';
        }
        mysqli_stmt_close($stmt); # cerrar sentencia
    }
    mysqli_close($conexion);
} else {
    $rut = '';
    $nombre = '';
    $apellidos = '';
    $email = '';
    $telefono = '';
    $msg = '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>CRUD: Agregar</title>
</head>
<body>
    <!-- begin navbar -->
    <?php include('./inc/navbar.php');?>
    <!-- end navbar -->
    
    <div class="container">
        <h2 class="mt-5 text-uppercase">agregar</h2>

        <?php echo $msg; ?>

        <form action="./agregar.php" method="post">
            <div class="form-group row">
                <label for="rut" class="col-sm-2 col-form-label">Rut</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="rut" name="rut" aria-describedby="rutHelp" value="<?php echo $rut;?>" required autofocus >
                    <small id="rutHelp" class="form-text text-muted">Ingresar rut sin punto, sin guión ni dígito verifivador.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos;?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    <a href="./recuperar.php" class="btn btn-outline-danger">Cancelar</a>
                </div>
            </div>
        </form>

        <div class="mt-5">
            <h5>Sentencias preparadas</h5>
            <p>Es una característica utilizada para ejecutar una sentencia declarada repetidamente con alta eficiencia.</p>
            <p>Su funcionamiento es el siguiente:</p>

            <ol>
                <li>
                    <p>Se define una plantilla SQL que se envía a la base de datos, en la cual ciertos valores (parámetros) se dejan sin especificar. Su sintaxis:</p>
                    <p><code>INSERT INTO table_name(col_1, col_2, ... col_n) VALUES(?, ?, ?)</code></p>
                </li>
                <li>La base de datos analiza, compila y realiza la optimización de consultas en la plantilla SQL y almacena el resultado sin ejecutarlo.</li>
                <li>Se vinculan los valores a los parámetros y la base de datos ejecuta la sentencia.</li>
            </ol>
        </div>
      
    </div>

    
</body>
</html>