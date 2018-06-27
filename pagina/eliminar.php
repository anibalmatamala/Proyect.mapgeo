<?php
require('./config/db_connect.php');
if (!empty($_GET)) {
    # code...
    $rut = $_GET['rut'];
    $conexion = connect();
    $sql = 'DELETE FROM persona WHERE rut = ?';

    if ($stmt = mysqli_prepare($conexion, $sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $rut);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conexion);
            header("Location: recuperar.php?msg=3");
        }
    }
} else {
    header("Location: recuperar.php?msg=4");
}

?>