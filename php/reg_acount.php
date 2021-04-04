<?php
require "./conexion.php";
session_start();
if (isset($_POST['guardar']) && !empty($_POST['contraseña']) && !empty($_POST['email'])) {
    $contraseña = $_POST['contraseña'];
    $correo = $_POST['email'];
    $telefono=$_POST['telefono'];
    $seleccion1 = "SELECT * FROM usuarios WHERE TELEFONO = '$telefono'";
    $resultado1 = mysqli_query($conexion, $seleccion1) or die('ERROR' . mysqli_error($error));
    while ($registro1 = mysqli_fetch_array($resultado1)) {
        echo $ID = $registro1['ID'];
    }
    echo $ID . ' ' . $correo . ' ' . $contraseña;
    $seleccion2 = "UPDATE usuarios SET CONTRASEÑA = '$contraseña', CORREO = '$correo' WHERE ID = '$ID'";
    $resultado2 = mysqli_query($conexion, $seleccion2) or die('ERROR ' . mysqli_error($error));
    if (!$resultado2) {
        echo
        '<script type="text/javascript">
        alert("FALLO EN LA CONSULTA");
        window.history.go(-1);
        </script>';
    } else {
        $_SESSION['cuenta'] = 'Usuario registrado correctamente, logueate para ingresar al sitio';
        $_SESSION['tipo_mensaje1'] = 'success';
        header("location: ../index.php");
    }
} else if (!isset($_POST['guardar'])){
    echo
    '<script type="text/javascript">
        alert("DATOS NO INGRESADOS");
        window.history.go(-1);
        </script>';
}
