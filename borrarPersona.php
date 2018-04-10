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
    
    // the query who send the data to the db
    $borrarPersona= "DELETE FROM personas WHERE id='$id'";
    
    if ($mysqli->query($borrarPersona)){
        echo('<div class="alert alert-success">
        <strong>Se borro al usurio con el id '.$id.'</strong>.
      </div>
        ');
    }else{
        echo('<div class="alert alert-warning">
        <strong>¡Ups! hubo un problema al borrar la persona.</strong>.
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