<script src="../../../templete/dist/js/sweetalert.js"></script>
<!-- ACTUALIZAR RAMA -->
<div class="modal fade" id="myModal_Update_Rama<?php echo $rama['id_rama'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUpdate_Rama">
  <div class="modal-dialog" role="document">
    <form id="editar_rama" action="controller_update_rama.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #3498DB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelUpdate_Rama" style="color:white" >ACTUALIZAR RAMA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 style="background:#21618C; color:white;">&nbsp &nbsp &nbsp DATOS DE LA RAMA</h5>
                        <div class="col-xs-9">
                            <div class="form-group">
                                <input name="id_rama" type="hidden" value="<?php echo $rama['id_rama'];?>">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_rama" value="<?php echo $rama['rama'];?>" required>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_rama" id="" class="form-control">
                                    <option <?php if($rama['est_rama']=="1"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?>value="1" >ACTIVO</option>
                                    <option <?php if($rama['est_rama']=="0"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?>value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-info" value="Actualizar">
            </div>
        </div>
    </form>
  </div>
</div>

<!-- SCRIPT DE ALERTAS-->
<script>
    $(document).ready(function() {
        $('#editar_rama').submit(function(event) {
            event.preventDefault(); // Prevenir que se envíe el formulario normalmente
            $.ajax({
                url: 'controller_update_rama.php',
                type: 'POST',
                data: $(this).serialize(),
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