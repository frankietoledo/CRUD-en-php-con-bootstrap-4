<?php 
// here is the header for all pages of the site.
include 'header.php';
include 'menu.php';
?>
<title>Inicio</title>
<body>
    <div class="container-fluid p-3">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'funciones/poblarTabla.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>