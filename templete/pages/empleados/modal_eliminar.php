<!-- ELIMINAR EMPLEADO -->
<div class="modal fade" id="myModal_Delete_Empleado<?php echo $empleado['id_empleado'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDelete_Empleado">
  <div class="modal-dialog" role="document">
    <form action="controller_delete_empleado.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #FA2A2A;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabelDelete_Empleado" style="color:white" >¿REALMENTE DESEA ELIMINAR EL USUARIO?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <h5 style=" background:#EA0A0A; color:white;">&nbsp &nbsp &nbsp DATOS DEL USUARIO</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="id_empleado" value="<?php echo $empleado['id_empleado'];?>" type="hidden">
                                <label for="">Nombre: </label> <?php echo $empleado['nom_emp'] . " " . $empleado['appat_emp'] . " " . $empleado['apmat_emp'];?>
                                <br>
                                <label for="">Cargo: </label> <?php echo $empleado['cargo'];?>
                                <br>
                                <label for="">Dependencia: </label> <?php echo $empleado['dependencia'];?>
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