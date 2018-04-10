<?php
    $mysqli= new mysqli("localhost","root","","prueba");
    if (mysqli_connect_errno()){
        echo "Error en la conexion a la BD";
    }
    $mysqli -> set_charset("utf8");

?>