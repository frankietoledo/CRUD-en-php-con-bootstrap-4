<!-- // include the menu and the header -->
<?php
    include'header.php';
    include'menu.php';
?>
<body>
    <div class="container-fluid p-3">
        <h3 class="mx-auto">Enviar personas a la base de datos.</h3>

                <form action="guardar.php" method="post">
                        <label for="nombre">Nombre:</label>
                        <input autocomplete="off" type="text" required title="Minimo 3 caracteres" pattern=".{3,}" name="nombre" class="form-control"> <br>
                        <label for="apellido">Apellido:</label>
                        <input autocomplete="off" type="text" required  title="Minimo 3 caracteres" pattern=".{3,}" name="apellido" class="form-control"><br>

                    <input type="submit" value="Enviar" class="btn btn-primary mx-auto">
                </form>
    </div>

    <?php
        if(isset($_POST['nombre']) && isset($_POST['apellido'])){
		            
            // require the connection and the fields with the data
            require_once "conexion.php";
            $nombre= $_POST['nombre'];
            $apellido = $_POST['apellido'];
            
            // the query who send the data to the db
            $insertarNombreApellido = "INSERT INTO personas(nombre,apellido) VALUES ('$nombre','$apellido')";
            echo ("<div class='container p-3'>");
            if ($mysqli->query($insertarNombreApellido)){
                echo('<div class="alert alert-success">
                <strong>¡Datos enviados correctamente!</strong>.
              </div>
                ');
            }else{
                echo('<div class="alert alert-warning">
                <strong>¡Ups! hubo un problema al enviar los datos.</strong>.
              </div>
                ');            
            }
            echo ('</div>');
        }
        ?>

</body>