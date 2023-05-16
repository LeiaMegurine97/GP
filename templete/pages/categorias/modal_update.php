<!-- ACTUALIZAR CATEGORÍA -->
<div class="modal fade" id="myModal_Update_Categoria<?php echo $categoria['id_categoria'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUpdate_Categoria">
  <div class="modal-dialog" role="document">
    <form action="controller_update_categoria.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #3498DB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelUpdate_Categoria" style="color:white" >ACTUALIZAR CATEGORÍA</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 style="background:#21618C; color:white;">&nbsp &nbsp &nbsp DATOS DE LA CATEGORÍA</h5>
                        <div class="col-xs-9">
                            <div class="form-group">
                                <input name="id_categoria" type="hidden" value="<?php echo $categoria['id_categoria'];?>">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_categoria" value="<?php echo $categoria['categoria'];?>" required>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_categoria" id="" class="form-control">
                                    <option <?php if($categoria['est_cat']=="1"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?>value="1" >ACTIVO</option>
                                    <option <?php if($categoria['est_cat']=="0"){
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