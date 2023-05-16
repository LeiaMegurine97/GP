<!-- AGREGAR INSCRIPCIÓN -->
<div class="modal fade" id="myModal_Add_Inscripcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd_Inscripcion">
  <div class="modal-dialog" role="document">
    <form id="agregar_registro" action="controller_add_registro.php" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header" style="background:#800101;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabelAdd_Inscripcion" style="color:white" >REGISTRAR INSCRIPCIÓN</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <h5 style="background:#800101; color:white;">&nbsp &nbsp &nbsp DATOS DEL DEPORTE</h5>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Categoría</label>
                                    <select class="form-control" type="text" name="id_categoria" id="id_categoria" onchange="javascript:obtener_select_dep2();">
                                        <option selected="true" disabled="disabled" value=0 >SELECCIONAR...</option>
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
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Rama</label>
                                    <select class="form-control" type="text" name="id_rama" id="id_rama" onchange="javascript:obtener_select_dep2();">
                                        <option selected="true" disabled="disabled" value=0 >SELECCIONAR...</option>
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
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select name="tipo_deporte" id="tipo_deporte" class="form-control" onchange="javascript:obtener_select_dep2();">
                                        <option selected="true" disabled="disabled" value=0 >SELECCIONAR...</option>
                                        <option value="INDIVIDUAL" >INDIVIDUAL</option>
                                        <option value="EQUIPO">EQUIPO</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Deporte</label>
                                    <select class="form-control" type="text" name="id_deporte" id="id_deporte" onchange="javascript:num_jugadores();">
                                        <option selected="true" disabled="disabled" value=0 >SELECCIONAR...</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12" id="dinamic">
                                
                        </div>
                        <div class="col-xs-9"></div>
                        <div class="col-xs-3">
                            <button type="button" class="btn btn-default" id="agregar" style="display: none;"> + Agregar </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success " id="btn-Agregar" value="Agregar" style="display: none;">
            </div>
        </div>
    </form>
  </div>
</div>

<!-- SCRIPT PARA GENERAR LOS CAMPOS DE LOS INTEGRANTES POR DEFECTO -->
<script src="div-inicio.js"></script>


<!-- SCRIPT PARA LLENAR EL COMBOX DEPORTE, DEPENDIENDO LA SELECCIÓN DE LOS COMBOXS RAMA, CATEGORIA, Y TIPO DE DEPORTE-->
<script>
    //Declaracion de las variables max y min 
    var maxJug;
    var minJug;
  // Cuando se cambie la selección de id_rama, id_categoria o tipo_deporte, llamar a la función obtener_select_dep2
  $('#id_rama, #id_categoria, #tipo_deporte').on('change', obtener_select_dep2);

    function obtener_select_dep2() {
        // obtener los valores seleccionados de los select
        var id_rama = $('#id_rama').val();
        var id_categoria = $('#id_categoria').val();
        var tipo_deporte = $('#tipo_deporte').val();

        // hacer la petición AJAX
        $.ajax({
            url: 'obtener_select_dep2.php',
            type: 'POST',
            data: {
                id_rama: id_rama,
                id_categoria: id_categoria,
                tipo_deporte: tipo_deporte
            },
            success: function(respuesta) {
                // actualizar el select de deporte
                $('#id_deporte').html(respuesta);
                $('#dinamic').attr('data-min', 0).attr('data-max', 0); 
                
                $('#dinamic').empty();
                $('#btn-Agregar').hide();
            }
        });
    }
</script>

<!-- SCRIPT QUE ASIGNA VALORES DE DATA-MIN Y MAX, Y APARTE LLENA EL CONTENIDO DEL DIV #dinamic -->
<script>
    // Cuando se cambie la selección de id_deporte llamar a la función num_jugadores
    $('#id_deporte').on('change', num_jugadores);

    function num_jugadores() {
        // obtener los valores seleccionados de los select
        var id_deporte = $('#id_deporte').val();

        // hacer la petición AJAX
        $.ajax({
            url: 'num_jugadores.php',
            type: 'POST',
            data: {
                id_deporte
            },
            success: function(respuesta) {
                // actualizar el select de deporte
                $('#dinamic').html(respuesta);

                // Obtener los valores mínimo y máximo de jugadores
                minJug = $('#dinamic').attr('data-min');
                maxJug = $('#dinamic').attr('data-max');

                // crear los inputs
                createInputs(minJug);              

                if(maxJug>1){
                    $('#agregar').show();
                }else{
                    
                    $('#agregar').hide();
                }
                $('#btn-Agregar').show();
            }
        });
    }
</script>
