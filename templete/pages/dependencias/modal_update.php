<!-- ACTUALIZAR DEPENDENCIA -->
<div class="modal fade" id="myModal_Update_Dependencia<?php echo $dependencia['id_dependencia'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUpdate_Dependencia">
  <div class="modal-dialog" role="document">
    <form action="controller_update_dependencia.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #3498DB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelUpdate_Dependencia" style="color:white" >ACTUALIZAR DEPENDENCIA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 style="background:#21618C; color:white;">&nbsp &nbsp &nbsp DATOS DE LA DEPENDENCIA</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="id_dependencia" type="hidden" value="<?php echo $dependencia['id_dependencia'];?>">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre_dependencia" style="text-transform: uppercase" value="<?php echo $dependencia['dependencia'];?>" required>
                            </div>
                        </div>
                        <div class="col-xs-9"></div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_dependencia" id="" class="form-control">
                                    <option <?php if($dependencia['est_dep']=="1"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?>value="1" >ACTIVO</option>
                                    <option <?php if($dependencia['est_dep']=="0"){
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