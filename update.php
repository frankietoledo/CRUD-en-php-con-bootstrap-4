<?php 
include 'header.php';
include 'menu.php';
?>
<body>
    <div class="container p-3">
        <?php
    if(isset($_GET['id'])){
                        
        // require the connection and the fields with the data
        require_once "conexion.php";
        $id= $_GET['id'];
        $nombre= $_GET['nombre'];
        $apellido= $_GET['apellido'];

        // the query who send the data to the db
        $actualizarDatos= "UPDATE personas SET nombre='$nombre', apellido='$apellido' WHERE id='$id'";
        
        if ($mysqli->query($actualizarDatos)){
            echo('<div class="alert alert-success">
            <strong>La persona se actualizo correctamente</strong>.
        </div>
            ');
        }else{
            echo('<div class="alert alert-warning">
            <strong>¡Ups! hubo un problema al actualizar la persona.</strong>.
        </div>
            ');            
        }
        }else{
        echo('<div class="alert alert-warning">
            <strong>Error al procesar el id de la persona</strong>.
        </div>
            '); 
        }
        ?>
    </div>
</body>