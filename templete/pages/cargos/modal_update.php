<!-- ACTUALIZAR CARGO -->
<div class="modal fade" id="myModal_Update_Cargo<?php echo $cargo['id_cargo'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUpdate_Cargo">
  <div class="modal-dialog" role="document">
    <form action="controller_update_cargo.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #3498DB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelUpdate_Cargo" style="color:white" >ACTUALIZAR CARGO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 style="background:#21618C; color:white;">&nbsp &nbsp &nbsp DATOS DE LA CARGO</h5>
                        <div class="col-xs-9">
                            <div class="form-group">
                                <input name="id_cargo" type="hidden" value="<?php echo $cargo['id_cargo'];?>">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_cargo" value="<?php echo $cargo['cargo'];?>" required>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_cargo" id="" class="form-control">
                                    <option <?php if($cargo['est_car']=="1"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?>value="1" >ACTIVO</option>
                                    <option <?php if($cargo['est_car']=="0"){
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