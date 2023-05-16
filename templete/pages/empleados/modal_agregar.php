<!-- AGREGAR EMPLEADO -->
<div class="modal fade" id="myModal_Add_Empleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd_Empleado">
  <div class="modal-dialog" role="document">
    <form action="controller_add_empleado.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:#800101;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelAdd_Empleado" style="color:white" >AGREGAR USUARIO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h5 style="background:#800101; color:white;">&nbsp &nbsp &nbsp DATOS DE ACCESO</h5>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="">Cargo</label>
                                    <select name="cargo_empleado"  class="form-control" required>
                                        <?php
                                        $query_cargos=$pdo->prepare("SELECT * FROM Cargo");
                                        $query_cargos->execute();
                                        $resultados = $query_cargos->fetchAll (PDO:: FETCH_ASSOC);
                                        foreach($resultados as $cargo){ ?>
                                            <option value="<?php echo $cargo['id_cargo'];?>"><?php echo $cargo['cargo'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="">No. Empleado</label>
                                    <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)" minlegth="6" maxlength="6" name="noEmpleado_empleado" required>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="">NIP</label>
                                    <input type="password" class="form-control" onkeypress="return onlyNumberKey(event)" minlegth="4" maxlength="4" name="nip_empleado" required>
                                </div>
                            </div>

                            <div class="col-xs-9">
                                <div class="form-group">
                                    <label for="">Dependencia</label>
                                    <select name="dependencia_empleado"  class="form-control" required>
                                        <option selected="true" disabled="disabled">Seleccionar...</option>
                                        <?php
                                        $query_dependencias=$pdo->prepare("SELECT * FROM Dependencia");
                                        $query_dependencias->execute();
                                        $resultados = $query_dependencias->fetchAll (PDO:: FETCH_ASSOC);
                                        foreach($resultados as $dependencia){ ?>
                                            <option value="<?php echo $dependencia['id_dependencia'];?>"><?php echo $dependencia['dependencia'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="">Estado</label>
                                    <select name="estado_empleado"  class="form-control">
                                        <option value="1" >ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <h5 style="background:#800101; color:white;">&nbsp &nbsp &nbsp DATOS DEL USUARIO</h5>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_empleado" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Apellido Paterno</label>
                                    <input type="text" class="form-control" style="text-transform: uppercase" name="apPaterno_empleado" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Apellido Materno</label>
                                    <input type="text" class="form-control" style="text-transform: uppercase" name="apMaterno_empleado" required>
                                </div>
                            </div>
                            <div class="col-xs-3"></div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="">Sexo</label>
                                    <select name="sexo_empleado"  class="form-control">
                                        <option value="M" >MUJER</option>
                                        <option value="H">HOMBRE</option>
                                    </select>
                                </div>
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

<!-- SCRIPT PARA LIMITAR CARACTERES-->
<script>
    function onlyNumberKey(evt) {        
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
          return false;
        return true;
    }
</script>
<script>
    function detailssubmit() {
        alert("Your details were Submitted");
    }
</script>