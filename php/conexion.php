<?php
function conectar($host,$user,$pass,$bd){
    $conexion= mysqli_connect($host,$user,$pass,$bd);
    return $conexion;}
$host ='localhost';$user ='root';$pass='';$bd='registros';
$conexion=conectar($host,$user,$pass,$bd);
if (isset($conexion)){
   /*  echo 
    '<script>
    alert("conexion exitosa");
    </script>';  */
}else{
    echo 
    '<script>
    alert("ERROR");
    </script>';
}
