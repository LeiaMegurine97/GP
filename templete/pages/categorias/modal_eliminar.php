<!-- ELIMINAR CATEGORÍA -->
<div class="modal fade" id="myModal_Delete_Categoria<?php echo $categoria['id_categoria'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDelete_Categoria">
  <div class="modal-dialog" role="document">
    <form id="eliminar_categoria">
        <div class="modal-content">
            <div class="modal-header" style="background:  #FA2A2A;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabelDelete_Categoria" style="color:white" >¿REALMENTE DESEA ELIMINAR LA CATEGORÍA?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <h5 style=" background:#EA0A0A; color:white;">&nbsp &nbsp &nbsp DATOS DE LA CATEGORÍA</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="id_categoria" value="<?php echo $categoria['id_categoria'];?>" type="hidden">
                                <label for="">Nombre: </label> <?php echo $categoria['categoria'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-danger" value="Borrar">
            </div>
        </div>
    </form>
  </div>
</div>

<!-- SCRIPT DE ALERTAS-->
<script>
    $(document).ready(function() {
        $('#eliminar_categoria').submit(function(event) {
            event.preventDefault(); // Prevenir que se envíe el formulario normalmente
            $.ajax({
                url: 'controller_delete_categoria.php',
                type: 'POST',
                data: $(this).serialize(),
                datatype:'JSON',
                success: function(response) {
                    const { title, text, icon } = JSON.parse(response);
                    Swal.fire({
                        title,
                        text,
                        icon
                    }).then(function() {
                        // Redirigir a la página principal
                        window.location.href = 'index.php';
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al enviar el formulario',
                        icon: 'error'
                    }).then(function() {
                        // Redirigir a la página principal
                        window.location.href = 'index.php';
                    });
                }
            });
        });
    });
</script>

