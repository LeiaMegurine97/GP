<!-- ACTUALIZAR EMPLEADO -->
<div class="modal fade" id="myModal_Update_Empleado<?php echo $empleado['id_empleado'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelUpdate_Empleado">
  <div class="modal-dialog" role="document">
    <form action="controller_update_empleado.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:  #3498DB;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelUpdate_Empleado" style="color:white" >ACTUALIZAR USUARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <input name="id_empleado" type="hidden" value="<?php echo $empleado['id_empleado'];?>">
                        <div class="col-xs-12">
                            <h5 style="background:#21618C; color:white;">&nbsp &nbsp &nbsp DATOS DE ACCESO</h5>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label >Cargo</label>
                                    <select name="cargo_empleado" class="form-control" required>
                                        <?php
                                        $query_cargos=$pdo->prepare("SELECT * FROM Cargo");
                                        $query_cargos->execute();
                                        $resultados = $query_cargos->fetchAll (PDO:: FETCH_ASSOC);
                                        foreach($resultados as $cargo){ ?>
                                            <option <?php if($cargo['cargo']==$empleado['cargo']){?> selected="true" <?php }?> value="<?php echo $cargo['id_cargo'];?>"><?php echo $cargo['cargo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label >No. Empleado</label>
                                    <input type="text" class="form-control" value="<?php echo $empleado['no_empleado'];?>" onkeypress="return onlyNumberKey(event)" minlegth="6" maxlength="6" name="noEmpleado_empleado" required>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label >NIP</label>
                                    <input type="password" class="form-control" value="<?php echo $empleado['nip'];?>" onkeypress="return onlyNumberKey(event)" minlegth="4" maxlength="4" name="nip_empleado" required>
                                </div>
                            </div>

                            <div class="col-xs-9">
                                <div class="form-group">
                                    <label >Dependencia</label>
                                    <select name="dependencia_empleado" class="form-control" required>
                                        <?php
                                        $query_dependencias=$pdo->prepare("SELECT * FROM Dependencia");
                                        $query_dependencias->execute();
                                        $resultados = $query_dependencias->fetchAll (PDO:: FETCH_ASSOC);
                                        foreach($resultados as $dependencia){ ?>
                                            <option <?php if($dependencia['dependencia']==$empleado['dependencia']){?> selected="true" <?php }?>value="<?php echo $dependencia['id_dependencia'];?>"><?php echo $dependencia['dependencia'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label >Estado</label>
                                    <select name="estado_empleado" class="form-control">
                                        <option <?php if($empleado['est_emp']==1){?> selected="true" <?php }?> value="1" >ACTIVO</option>
                                        <option <?php if($empleado['est_emp']==0){?> selected="true" <?php }?> value="0">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <h5 style="background:#21618C; color:white;">&nbsp &nbsp &nbsp DATOS DEL USUARIO</h5>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label >Nombre</label>
                                    <input type="text" class="form-control" value="<?php echo $empleado['nom_emp'];?>"style="text-transform: uppercase" name="nombre_empleado" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label >Apellido Paterno</label>
                                    <input type="text" class="form-control" value="<?php echo $empleado['appat_emp'];?>" style="text-transform: uppercase" name="apPaterno_empleado" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label >Apellido Materno</label>
                                    <input type="text" class="form-control" value="<?php echo $empleado['apmat_emp'];?>" style="text-transform: uppercase" name="apMaterno_empleado" required>
                                </div>
                            </div>
                            <div class="col-xs-3"></div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label >Sexo</label>
                                    <select name="sexo_empleado" class="form-control">
                                        <option <?php if($empleado['sexo_emp']=="M"){?> selected="true" <?php }?> value="M" >MUJER</option>
                                        <option <?php if($empleado['sexo_emp']=="H"){?> selected="true" <?php }?> value="H">HOMBRE</option>
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