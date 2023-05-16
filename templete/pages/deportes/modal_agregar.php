<!-- AGREGAR DEPORTE -->
<div class="modal fade" id="myModal_Add_Deporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd_Deporte">
  <div class="modal-dialog" role="document">
    <form action="controller_add_deporte.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:#800101;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelAdd_Deporte" style="color:white" >AGREGAR DEPORTE</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <h5 style="background:#800101; color:white;">&nbsp &nbsp &nbsp DATOS DEL DEPORTE</h5>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_deporte" required>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="">Categoria</label>
                                <select name="categoria_deporte" id="" class="form-control" required>
                                    <?php
                                    $query_categorias=$pdo->prepare("SELECT * FROM Categoria ORDER BY Categoria ASC");
                                    $query_categorias->execute();
                                    $resultados = $query_categorias->fetchAll (PDO:: FETCH_ASSOC);
                                    foreach($resultados as $categoria){ ?>
                                        <option value="<?php echo $categoria['id_categoria'];?>"><?php echo $categoria['categoria'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_deporte" id="" class="form-control">
                                    <option value="1" >ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Rama</label>
                                <select name="rama_deporte" id="" class="form-control" required>
                                    <option selected="true" disabled="disabled">Seleccionar...</option>
                                    <?php
                                    $query_ramas=$pdo->prepare("SELECT * FROM Rama ORDER BY Rama ASC");
                                    $query_ramas->execute();
                                    $resultados = $query_ramas->fetchAll (PDO:: FETCH_ASSOC);
                                    foreach($resultados as $rama){ ?>
                                        <option value="<?php echo $rama['id_rama'];?>"><?php echo $rama['rama'];?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Tipo de Deporte</label>
                                <select name="tipo_deporte" id="" class="form-control">
                                    <option value="EQUIPO">EQUIPO</option>    
                                    <option value="INDIVIDUAL" >INDIVIDUAL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Min. Jugadores</label>
                                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)" minlegth="1" maxlength="2" name="minjugadores_deporte" required>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Max. Jugadores</label>
                                <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)" minlegth="1" maxlength="2" name="maxjugadores_deporte" required>
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