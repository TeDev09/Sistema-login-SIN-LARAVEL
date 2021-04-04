<?php session_start();
require('./php/conexion.php') ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <title>Creación de usuario</title>
    <style>
    .main {
        padding-top: 250px;
    }
</style>
</head>
<body class="fondo">
<div class="center main" id="circulo">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="hide" id="contenido">
        
        <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="txt-center">
                <div class="materialert error">
                    <div class="material-icons">error_outline</div>
                    Error! asegurate de llenar correctamente: <?= $_SESSION['mensaje'] ?>
                </div>
            </div>
        <?php session_unset();
        } else if (isset($_SESSION['mensaje1'])) { ?>
            <div class="txt-center">
                <div class="materialert warning">
                    <div class="material-icons">warning</div>
                    <?= $_SESSION['mensaje1'] ?> <b>|-|CUIDADO|-|SI SALES DE ESTA PÁGINA NO COMPLETARAS TU PROCESO DE REGISTRO</b>
                </div>
            </div>
            <div class="cuadro">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="center">
                                <h4>Ingresa datos <b>de cuenta</b></h4>
                                <p>Necesarios para iniciar sesión</p>
                                <div class="divi"></div>
                                <br>
                            </div>
                            <form action="./php/reg_acount.php" method="post" name="insertar">
                                <!-- //!Columna 1 -->
                                <div class="col s8 push-s2 center">
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                                <h6>Ingresa tu Email</h6>
                                            </div>
                                            <input type="email" name="email" class="validate" placeholder="email" required>
                                        </div>
                                    </div>
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                                <h6>Ingresa una contraseña
                                                </h6>
                                            </div>
                                            <input type="password" name="contraseña" class="validate" minlength="5" placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                            </div>
                                            <?php
                                            $seleccion1 = "SELECT * FROM usuarios WHERE ID = '$_SESSION[acount]'";
                                            $resultado1 = mysqli_query($conexion, $seleccion1) or die('ERROR' . mysqli_error($error));
                                            while ($registro1 = mysqli_fetch_array($resultado1)) {
                                                $telefonoF = $registro1['TELEFONO'];
                                            }?>
                                            <input type="hidden" name="telefono" value="<?php print $telefonoF ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="divi">
                                    <div class="center">
                                        <br>
                                        <button class="btn waves-effect waves-light  blue darken-2" id="boton" type="submit" name="guardar">Enviar
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php session_unset();
        } else { ?>
            <br><br><br>
            <div class="cuadro">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="center">
                                <h4>Ingreso de datos personales</h4>
                                <div class="divi"></div>
                                <br>
                            </div>
                            <form action="./php/reg.php" method="POST" name="insertar">
                                <!-- //!Columna 1 -->
                                <div class="col s5  ">
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                                <h6>Ingresa tu nombre</h6>
                                            </div>
                                            <input type="text" name="nombres" class="validate" minlength="3" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                                <h6>Ingresa tus apellidos</h6>
                                            </div>
                                            <input type="text" name="apellidos" class="validate" minlength="3"  placeholder="Apellidos" required>
                                        </div>
                                    </div>
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                                <h6>Ingresa tu dirección</h6>
                                            </div>
                                            <input type="text" name="direccion" class="validate" minlength="3" placeholder="Dirección" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- //!Columna 2 -->
                                <div class="col s5 right">
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                                <h6>Ingresa tu teléfono</h6>
                                            </div>
                                            <input type="tel" name="telefono" class="validate" minlength="5" maxlength="9"  placeholder="Teléfono" required>
                                        </div>
                                    </div>
                                    <div id="cuadro1">
                                        <div>
                                            <div class="center">
                                                <h6>Ingresa tu pago por hora</h6>
                                            </div>
                                            <input type="text" name="pago" class="validate" placeholder="Pago por hora" required>
                                        </div>
                                    </div>
                                    <div id="cuadro1">
                                        <select class="browser-default" name="trabajo" required>
                                            <option value="" name="default" disabled selected>Escoje tu trabajo</option>
                                            <option value="trabajo1" name="trabajo1">trabajo 1</option>
                                            <option value="trabajo2" name="trabajo2">trabajo 2</option>
                                            <option value="trabajo3" name="trabajo3">trabajo 3</option>
                                        </select>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="divi">
                                    <div class="center">
                                        <br>
                                        <button class="btn waves-effect waves-light  blue darken-2" id="boton" type="submit" name="guardar">Enviar
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <script>
window.addEventListener('load', () => {
            setTimeout(carga, 1000);
            function carga() {
                document.getElementById('circulo').className = 'hide';
                document.getElementById('contenido').className = 'center';
            }
        })
    </script>
</body>

</html>