<!-- ELIMINAR GIRO -->
<div class="modal fade" id="myModal_Delete_Dependencia<?php echo $dependencia['id_dependencia'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDelete_Dependencia">
  <div class="modal-dialog" role="document">
    <form action="controller_delete_dependencia.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #FA2A2A;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabelDelete_Dependencia" style="color:white" >¿REALMENTE DESEA ELIMINAR LA DEPENDENCIA?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <h5 style=" background:#EA0A0A; color:white;">&nbsp &nbsp &nbsp DATOS DE LA DEPENDENCIA</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="id_dependencia" value="<?php echo $dependencia['id_dependencia'];?>" type="hidden">
                                <label for="">Nombre: </label> <?php echo $dependencia['dependencia'];?>
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