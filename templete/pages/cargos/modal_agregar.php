<!-- AGREGAR CARGO -->
<div class="modal fade" id="myModal_Add_Cargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd_Cargo">
  <div class="modal-dialog" role="document">
    <form action="controller_add_cargo.php" method="post">
        <div class="modal-content">
            <div class="modal-header" style="background:#800101;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelAdd_Cargo" style="color:white" >AGREGAR CARGO</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 style="background:#800101; color:white;">&nbsp &nbsp &nbsp DATOS DE LA CARGO</h5>
                        <div class="col-xs-9">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" style="text-transform: uppercase" name="nombre_cargo" required>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado_cargo" id="" class="form-control">
                                    <option value="1" >ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
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