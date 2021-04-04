<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script>
    <title>Login</title>
    <style>
        #cuadro1{
      right: 0;
  }
    </style>
</head>

<body class="fondo valign-wrapper">
    <?php if (isset($_SESSION['cuenta'])) { ?>
        <div class="txt-center">
            <div class="materialert success">
                <div class="material-icons">check</div>
                <?= $_SESSION['cuenta'] ?>
            </div>
        <?php session_unset(); } ?>
        <br><br><br>
        <div class="cuadro">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="center">
                            <h4>Ingresa los datos de tu cuenta</h4>
                            <div class="divi"></div>
                            <br>
                        </div>
                        <form action="./php/log.php" method="post" name="insertar">
                            <!-- //!Columna 1 -->
                            <div class="col s8  push-s2">
                                <div id="cuadro1" class="center-align">
                                    <div class="center-align">
                                        <div class="center">
                                            <h6>Ingresa tu Email</h6>
                                        </div>
                                        <input type="email" name="email" class="validate" placeholder="Email" required>
                                    </div>
                                </div>
                                <div id="cuadro1" class="center-align">
                                    <div class="center-align">
                                        <div class="center">
                                            <h6>Ingresa tu contraseña</h6>
                                        </div>
                                        <input type="password" name="contraseña" class="validate" placeholder="Contraseña" required>
                                    </div>
                                </div>
                            </div>
                            <div class="divi">
                                <div class="center">
                                    <br>
                                    <button class="btn waves-effect waves-light" id="boton" type="submit" name="guardar">Enviar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
</body>

</html>