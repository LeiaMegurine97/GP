<!-- ACTUALIZAR DEPORTE -->
<div class="modal fade" id="myModal_Update_Deporte<?php echo $deporte['id_deporte'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUpdate_Deporte">
  <div class="modal-dialog" role="document">
    <form action="controller_update_deporte.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #3498DB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelUpdate_Deporte" style="color:white" >ACTUALIZAR DEPORTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 style="background:#21618C; color:white;">&nbsp &nbsp &nbsp DATOS DE LA DEPORTE</h5>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input name="id_deporte" type="hidden" value="<?php echo $deporte['id_deporte'];?>">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre_deporte" value="<?php echo $deporte['deporte'];?>" required>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Categoria</label>
                                    <select name="categoria_deporte" id="" class="form-control">
                                        <?php
                                        $query_categorias=$pdo->prepare("SELECT * FROM Categoria");
                                        $query_categorias->execute();
                                        $resultados = $query_categorias->fetchAll (PDO:: FETCH_ASSOC);
                                        foreach($resultados as $categoria){ ?>
                                        <option <?php if($categoria['categoria']==$deporte['categoria']){?> selected="true" <?php }?> value="<?php echo $categoria['id_categoria'];?>"><?php echo $categoria['categoria'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_deporte" id="" class="form-control">
                                    <option <?php if($deporte['est_depo']=="1"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?>value="1" >ACTIVO</option>
                                    <option <?php if($deporte['est_depo']=="0"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?>value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Rama</label>
                                <select name="rama_deporte" id="" class="form-control" required>
                                    <?php
                                    $query_ramas=$pdo->prepare("SELECT * FROM Rama");
                                    $query_ramas->execute();
                                    $resultados = $query_ramas->fetchAll (PDO:: FETCH_ASSOC);
                                    foreach($resultados as $rama){ ?>
                                        <option value="<?php echo $rama['id_rama'];?>"
                                            <?php if($deporte['rama']==$rama['rama']){ ?> 
                                                selected="true"
                                            <?php } ?> >
                                            <?php echo $rama['rama'];?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Tipo de Deporte</label>
                                <select name="tipo_deporte" id="" class="form-control">
                                <option <?php if($deporte['tipo_depo']=="INDIVIDUAL"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?> value="INDIVIDUAL" >INDIVIDUAL</option>
                                    <option <?php if($deporte['tipo_depo']=="EQUIPO"){
                                        ?>
                                        selected="true"
                                        <?php
                                    }?> value="EQUIPO">EQUIPO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">No. de Jugadores</label>
                                <input type="text" class="form-control" value="<?php echo $deporte['nojug_depo']?> "onkeypress="return onlyNumberKey(event)" minlegth="1" maxlength="2" name="jugadores_deporte" required>
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