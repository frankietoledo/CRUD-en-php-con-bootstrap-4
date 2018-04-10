<?php 
    // here call to bd and return all data into td for any people
    require_once "conexion.php";
    // This is the query to execute in mysql
    $queryTodos="SELECT * FROM personas";
    // here prepare the sentence
    $consulta = $mysqli->query($queryTodos);
    // while have results from the tables, add in <tr>
    while ($fila=$consulta->fetch_array(MYSQLI_ASSOC)){
        ?>
           

        <?php
        echo "<tr>
                <td>".$fila['nombre']."</td>
                <td>".$fila['apellido']."</td>
                <td>
                    <button user-id=".$fila['id']." nombre=".$fila['nombre']." type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>
                        <i class='fa fa-close'></i>
                    </button>
                </td>
                <td>
                    <button user-id=".$fila['id']." nombre=".$fila['nombre']." apellido=".$fila['apellido']." type='button' class='btn btn-success' data-toggle='modal' data-target='#updateModal'>
                        <i class='fa fa-edit'></i>
                </td>
            </td>";
        ?>
        <!-- Delete Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="tituloModal">Estas por borrar a </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Se borrara permanentemente de la base de datos. <br>¿Deseas continuar?
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="" id=aBorrar>
                            <button id="btnBorrar" type="button" class="btn btn-danger">Borrar</button>
                        </a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>  
        </div> <!-- Fin del modal Delete--> 

        <!-- Update Modal-->
        <div class="modal fade" id="updateModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"> Actualizar entrada</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="udpatePeople.php" method="post">
                            <div class="form-group">
                                <label for="nombreUpdate">Nombre: </label>
                                <input class="form-control" type="text" name="nombre" id="nombreUpdate">
                            </div>

                            <div class="form-group">
                                <label for="apellidoUpdate">Apellido: </label>
                                <input class="form-control" type="text" name="apellido" id="apellidoUpdate">
                            </div>
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="" id="aUpdate">
                            <button id="btnUpdate" type="button" class="btn btn-success">Actualizar</button>
                        </a>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>  
        </div> <!-- Fin del modal Update--> 

        <?php
    }?>

<script>
    $('#myModal').on('show.bs.modal', function (e) {
        // get information to update quickly to modal view as loading begins
        var opener=e.relatedTarget;//this holds the element who called the modal
        
        //we get details from attributes
        var nombre=$(opener).attr('nombre');

        //set what we got to our form
        $('#tituloModal').text("Estas a punto de borrar a "+nombre);
        $('#aBorrar').attr("href","borrarPersona.php?id="+$(opener).attr('user-id'));

    });

    $('#updateModal').on('show.bs.modal', function (e) {
        // get information to update quickly to modal view as loading begins
        var opener=e.relatedTarget;//this holds the element who called the modal
        

        //we get details from attributes
        var nombre=$(opener).attr('nombre');
        var apellido = $(opener).attr('apellido');
        
        var iNombre = $('#nombreUpdate');
        var iApellido = $('#apellidoUpdate');
        
        iNombre.val(nombre);
        iApellido.val(apellido);
        iNombre.change(actualizarURL);
        iApellido.change(actualizarURL);

        function actualizarURL() {
            //set what we got to our form
            $('#aUpdate').attr("href","update.php?id="+$(opener).attr('user-id')+"&nombre="+iNombre.val()+"&apellido="+iApellido.val());
        };
    });


</script>