<?php
session_start();
require "./conexion.php";
if (
    isset($_POST['guardar']) && !empty($_POST['nombres']) && !empty($_POST['apellidos']) &&
    !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['pago']) && !empty($_POST['trabajo'])
) {
    //! recolección de datos
    $nombresusu = $_POST['nombres'];
    $apellidosusu = $_POST['apellidos'];
    $telefonousu = $_POST['telefono'];
    $direccionusu = $_POST['direccion'];
    $pago = $_POST['pago'];
    $trabajo = $_POST['trabajo'];
    $op1 = 'trabajo1';
    $op2 = 'trabajo2';
    $op3 = 'trabajo3';
    date_default_timezone_set("America/El_Salvador");
    $currentTime = time();
    $DateTime = strftime("%d-%B-%Y %H:%M:%S", $currentTime);
    switch ($trabajo) {
        case $op1:
            $trabajousu = 'trabajo1';
            break;
        case $op2:
            $trabajousu = 'trabajo2';
            break;
        case $op3:
            $trabajousu = 'trabajo3';
            break;
        default:
            $trabajousu = 'ninguno';
            break;
    }
    $telefono = "SELECT * FROM usuarios WHERE TELEFONO = '$telefonousu'";
    $verificar = mysqli_query($conexion, $telefono);
    if (mysqli_num_rows($verificar) > 0) {
        echo
        '<script>
        alert("El correo ya está registrado");
        window.history.go(-1);
        </script>';
        exit;
    } else {
        $guardar = "INSERT INTO usuarios (NOMBRES, APELLIDOS, TELEFONO, PAGO_HORA, DIRECCION, TRABAJO, CREACION) VALUES
    ('$nombresusu', '$apellidosusu', '$telefonousu', '$pago', '$direccionusu', '$trabajousu', '$DateTime')";
        $resultado = mysqli_query($conexion, $guardar);
        if (!$resultado) {
            echo
            '<script type="text/javascript">
        alert("FALLO EN LA CONSULTA");
        window.history.go(-1);
        </script>';
            print "ERROR";
        } else {
            $seleccion1 = "SELECT * FROM usuarios WHERE TELEFONO = '$telefonousu'";
            $resultado1 = mysqli_query($conexion, $seleccion1) or die('ERROR ' . mysqli_error($error));
            while ($registro1 = mysqli_fetch_array($resultado1)) {
                $ID = $registro1['ID'];
            }
            $_SESSION['acount'] = $ID;
            $_SESSION['mensaje1'] = 'Datos personales ingresados correctamente, completa el último paso para continuar';
            $_SESSION['tipo_mensaje1'] = 'success';
            header("location: ../register.php");
        }
    }
} else {
    if (!isset($_SESSION['nombres']) && !isset($_SESSION['apellidos']) && !isset($_SESSION['telefono']) && !isset($_SESSION['direccion']) && !isset($_SESSION['pago']) && !isset($_SESSION['trabajo'])) {
        $error = 'Todos';
    } else if (!isset($_SESSION['apellidos']) && !isset($_SESSION['telefono']) && !isset($_SESSION['direccion']) && !isset($_SESSION['pago']) && !isset($_SESSION['trabajo'])) {
        $error = 'Apellidos, telefono, direccion, pago, trabajo';
    } else if (!isset($_SESSION['telefono']) && !isset($_SESSION['direccion']) && !isset($_SESSION['pago']) && !isset($_SESSION['trabajo'])) {
        $error = 'telefono, direccion, pago, trabajo';
    } else if (!isset($_SESSION['direccion']) && !isset($_SESSION['pago']) && !isset($_SESSION['trabajo'])) {
        $error = 'direccion, pago, trabajo';
    } else if (!isset($_SESSION['pago']) && !isset($_SESSION['trabajo'])) {
        $error = 'email, trabajo';
    } else if (!isset($_SESSION['trabajo'])) {
        $error = 'trabajo';
    } else {
        $error = 'Desconocido';
    }

    $_SESSION['mensaje'] = '"' . $error . '"';
    $_SESSION['tipo_mensaje'] = 'error';
    header("location: ../register.php");
}
?>
<a href="../index.php">Volver</a>