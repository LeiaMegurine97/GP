<!-- AGREGAR RAMA -->
<div class="modal fade" id="myModal_Add_Rama" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd_Rama">
  <div class="modal-dialog" role="document">
    <form id="registrar_rama" action="controller_add_rama.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:#800101;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelAdd_Rama" style="color:white" >AGREGAR RAMA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 style="background:#800101; color:white;">&nbsp &nbsp &nbsp DATOS DE LA RAMA</h5>
                        <div class="col-xs-9">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_rama" required>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_rama" id="" class="form-control">
                                    <option value="1" >ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success " value="Agregar">
            </div>
        </div>
    </form>
  </div>
</div>

<!-- SCRIPT DE ALERTAS-->
<script>
    $(document).ready(function() {
        $('#registrar_rama').submit(function(event) {
            event.preventDefault(); // Prevenir que se envíe el formulario normalmente
            $.ajax({
                url: 'controller_add_rama.php',
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