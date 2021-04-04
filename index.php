<?php session_start(); ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <style>
        .main {
            padding-top: 250px;
        }
    </style>
    <title>Login||Register</title>
</head>

<body class="fondo ">
    <?php if (isset($_SESSION['cuenta'])) { ?>
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
        <div class="txt-center">
            <br><br><br>
            <div class="hide" id="contenido">
                <div class="materialert success">
                    <div class="material-icons">check</div>
                    <?= $_SESSION['cuenta'] ?>
                </div>
                <div class="valign-wrapper">
                    <div class="cuadro">
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="center">
                                        <h4>Logueate o registrate</h4>
                                        <div class="divi"></div>
                                        <br>
                                        <div class="col s6 left " id="loginsito">
                                            <div class="divider"></div>
                                            <br>
                                            <h6 class="flow-text">Logueate con tu cuenta previamente creada para acceder al sitio</h6>
                                            <br>
                                            <div class="center">
                                                <a class="btn  blue darken-2 tooltipped blanquito" data-position="right" data-tooltip="Logueate!" href="./login.php">
                                                    Logueate
                                                    <i class="material-icons right">person</i>
                                                </a>
                                            </div>
                                            <br>
                                            <div class="divider"></div>
                                        </div>
                                        <div class="col s6  right" id="regisito">
                                            <div class="divider"></div>
                                            <br>
                                            <h6 class="flow-text">Crea una cuenta con tus datos personales para acceder al sitio</h6>
                                            <br>
                                            <div class="center">
                                                <a class="btn  blue darken-2 tooltipped blanquito" data-position="left" data-tooltip="Registrate!" href="./register.php">
                                                    Registrate
                                                    <i class="material-icons right">person_add</i>
                                                </a>
                                            </div>
                                            <br>
                                            <div class="divider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
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
<?php session_unset();
    } else { ?>
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
    <br><br><br>
    <div class="hide" id="contenido">
        <div class="valign-wrapper">
            <div class="cuadro">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="center">
                                <h4>Logueate o registrate</h4>
                                <div class="divi"></div>
                                <br>
                                <div class="col s6 left " id="loginsito">
                                    <div class="divider"></div>
                                    <br>
                                    <h6 class="flow-text">Logueate con tu cuenta previamente creada para acceder al sitio</h6>
                                    <br>
                                    <div class="center">
                                        <a class="btn  light-blue darken-1 tooltipped blanquito" data-position="right" data-tooltip="Logueate!" href="./login.php">
                                            Logueate
                                            <i class="material-icons right">person</i>
                                        </a>
                                    </div>
                                    <br>
                                    <div class="divider"></div>
                                </div>
                                <div class="col s6  right" id="regisito">
                                    <div class="divider"></div>
                                    <br>
                                    <h6 class="flow-text">Crea una cuenta con tus datos personales para acceder al sitio</h6>
                                    <br>
                                    <div class="center">
                                        <a class="btn  light-blue darken-1 tooltipped blanquito" data-position="left" data-tooltip="Registrate!" href="./register.php">
                                            Registrate
                                            <i class="material-icons right">person_add</i>
                                        </a>
                                    </div>
                                    <br>
                                    <div class="divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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
<?php } ?>