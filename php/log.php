<html lang="es">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
<title>Comprobando...</title>
</head>

<body>
    <?php
    session_start();
    require("./conexion.php");
    if (isset($_POST['guardar']) && !empty($_POST['email']) && !empty($_POST['contraseña'])) {
        $correo = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $email = "SELECT * FROM usuarios WHERE CORREO = '$correo'";
        $seleccion1 = "SELECT * FROM usuarios WHERE CORREO = '$correo'";
        $resultado1 = mysqli_query($conexion, $seleccion1) or die('ERROR' . mysqli_error($error));
        while ($registro1 = mysqli_fetch_array($resultado1)) {
            $nombresF = $registro1['NOMBRES'];
            $apellidosF = $registro1['APELLIDOS'];
            $correoF = $registro1['CORREO'];
            $contraseñaF = $registro1['CONTRASEÑA'];
        }
        if (!isset($correoF)) {
        } else {
            if (($correoF == $correo) && ($contraseñaF == $contraseña)) {
                $_SESSION['ACCESO_TIPO_USUARIO'] = 'Usuario';
                $_SESSION['cuenta'] = "$_SESSION[ACCESO_TIPO_USUARIO]";
                $_SESSION['tipo_mensaje1'] = 'success';
                header("location: ../welcome.php");
            } else if ($correoF != $correo) {
    ?>
                <div class="center">
                    <h1>CORREO INCORRECTO</h1>
                    <br>
                    <a href="../login.php">Volver</a>
                </div>
                <?php
            } else {
                if ($contraseñaF != $contraseña) {
                ?>
                    <div class="center">
                        <h1>CONTRASEÑA O CORREO INCORRECTOS</h1>
                        <br>
                        <a href="../login.php">Volver</a>
                    </div>
        <?php
                }
                exit;
            }
        }
        ?>
        <div class="center">
            <h1>CORREO O CONTRASEÑA INCORRECTOS</h1>
            <br>
            <a href="../login.php">Volver</a>
        </div>
    <?php
    } else {
        print "ERROR||DATOS NO INGRESADOS";
        mysqli_free_result($resultado1);
        mysqli_close($conexion);
    }
    ?>
</body>

</html>