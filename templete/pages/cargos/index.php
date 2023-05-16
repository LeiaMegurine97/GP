<?php
  include('../../../config/config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Garzas de Plata | Cargos </title>
    <!-- INCLUIMOS LAS CABECERAS-->
    <?php
    include('../../../layout/header.php');
    ?>
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL;?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
      include('../../../layout/sidebar.php');
      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color:#F5F5F5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cargos
                <small>Gestión</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $URL;?>/templete/pages/panel.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active"><a href="#">Cargos</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
            <div class="row">            
                <div class="col-xs-12" style=" margin: 10px;">
                    <div class="col-xs-10"></div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_Add_Cargo">
                            <i class="fa fa-plus"></i> <span>&nbsp Nuevo Cargo</span>
                        </button>
                    </div>
                </div>
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header" style="background-color:#800101">
                      <h3 class="box-title" style="color:#fff">Cargos Registrados</h3>
                      
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="cargos" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th><center>#</center></th>
                            <th><center>Nombre</center></th>
                            <th><center>Estado</center></th>
                            <th><center>Acción</center></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query_cargos=$pdo->prepare("SELECT * FROM Cargo");
                          $query_cargos->execute();
                          $cargos = $query_cargos->fetchAll (PDO:: FETCH_ASSOC);
                          foreach($cargos as $cargo){ ?>
                            <tr>
                              <th><center><?php echo $cargo['id_cargo']; ?></center></th>
                              <td><?php echo $cargo['cargo']; ?></td>
                              <?php
                              if($cargo['est_car']=="1"){ ?>
                                <td><center><i class="fa fa-circle text-success"></i></center></td>
                              <?php }else{ ?>
                                <td><center><i class="fa fa-circle text-danger"></i></center></td>
                              <?php } ?>
                                <td>
                                  <center>
                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_Update_Cargo<?php echo $cargo['id_cargo'];?>" ><i class="fa fa-pencil-square-o "></i> Editar</a> &nbsp &nbsp
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_Delete_Cargo<?php echo $cargo['id_cargo'];?>" ><i class="fa fa-trash-o"></i> Eliminar</a>
                                  </center>
                                </td>
                            </tr>
                          <?php                                
                            //MODALES ELIMINAR Y ACTUALIZAR
                            include('../../../templete/pages/cargos/modal_update.php');
                            include('../../../templete/pages/cargos/modal_eliminar.php');
                          } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- FOOTER.PHP-->
      <?php
        include('../../../layout/footer.php');
      ?>
      <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- FOOTER-LINKS.PHP-->
    <?php
      include('../../../layout/footer-links.php');
    ?>
    <!-- DataTables -->
    <script src="<?php echo $URL;?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $URL;?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- page script -->
    <!-- FORMATO DE TABLA -->
    <script>
      $(function () {
          $('#cargos').DataTable({
              "responsive": true,
              "autoWidth":false,
              "pageLength": 10,
              "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "Todos"]],
              "language":{
                  "decimal": "",
                  "emptyTable": "No hay información",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ Cargos",
                  "infoEmpty": "Mostrando 0 de 0 Cargos",
                  "infoFiltered": "(Filtrado de _MAX_ total Cargos)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ Cargos",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscador de cargo:",
                  "zeroRecords": "Sin resultados encontrados",
                  "paginate":{
                      "first": "Primero",
                      "last": "Último",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  }
              }
          });
      });
    </script>
  </body>

  <!-- ESTILO DEL BOTON DE LA TABLA -->
  <style>
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
      background-color: #800101;
      border-color: #800101;
    }
  </style>
</html>

<!-- MODAL-->
<?php
  //AGREGAR cargo
  include('../../../templete/pages/cargos/modal_agregar.php');
?>