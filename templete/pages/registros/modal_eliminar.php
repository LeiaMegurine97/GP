<!-- ELIMINAR DEPORTE -->
<div class="modal fade" id="myModal_Delete_Deporte<?php echo $deporte['id_deporte'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDelete_Deporte">
  <div class="modal-dialog" role="document">
    <form action="controller_delete_deporte.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #FA2A2A;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabelDelete_Deporte" style="color:white" >¿REALMENTE DESEA ELIMINAR EL DEPORTE?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <h5 style=" background:#EA0A0A; color:white;">&nbsp &nbsp &nbsp DATOS DEL DEPORTE</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="id_deporte" value="<?php echo $deporte['id_deporte'];?>" type="hidden">
                                <label for="">Nombre: </label> <?php echo $deporte['deporte'];?>
                                <br>
                                <label for="">Categoria: </label> <?php echo $deporte['categoria'];?>
                                <br>
                                <label for="">Rama: </label> <?php echo $deporte['rama'];?>
                                <br>
                                <label for="">No. Jugadores: </label> <?php echo $deporte['nojug_depo'];?>
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