<?php
  include('../../../config/config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Garzas de Plata | Inscripciones </title>
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
                Inscripciones
                <small>Gestión</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $URL;?>/templete/pages/panel.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active"><a href="#">Inscripciones</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">            
            <div class="col-xs-12" style=" margin: 10px;">
              <div class="col-xs-10"></div>
                <div class="col-xs-2">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_Add_Inscripcion">
                    <i class="fa fa-plus"></i> <span>&nbsp Nueva Inscripción</span>
                  </button>
                </div>
              </div>
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header" style="background-color:#800101">
                    <h3 class="box-title" style="color:#fff">Inscripciones Registradas</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <table id="registros" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th><center># Registro</center></th>
                          <th><center>Deporte</center></th>
                          <th><center>Categoría</center></th>
                          <th><center>Rama</center></th>
                          <th><center>Tipo de Deporte</center></th>
                          <th><center>No. Jugadores</center></th>
                          <th><center>Estado</center></th>
                          <th><center>Acción</center></th>
                        </tr>
                      </thead>
                      <tbody>
                      <!--?php
                          $query_registros=$pdo->prepare("SELECT Deporte.id_deporte, Categoria.categoria, Rama.rama, Deporte.deporte, Deporte.tipo_depo, Deporte.nojug_depo, Deporte.est_depo FROM Deporte INNER JOIN Categoria ON Deporte.id_categoria=Categoria.id_categoria INNER JOIN Rama ON Deporte.id_rama=Rama.id_rama");
                          $query_registros->execute();
                          $registros = $query_registros->fetchAll (PDO:: FETCH_ASSOC);
                          foreach($registros as $deporte){ ?-->
                        <tr>
                          <th><center><!--?php echo $deporte['id_deporte'];?--></center></th>
                          <td><center><!--?php echo $deporte['deporte'];?--></center></td>
                          <td><center><!--?php echo $deporte['categoria'];?--></center></td>
                          <td><center><!--?php echo $deporte['rama'];?--></center></td>
                          <td><center><!--?php echo $deporte['tipo_depo'];?--></center></td>
                          <td><center><!--?php echo $deporte['nojug_depo'];?--></center></td>
                          <!--?php
                            if($deporte['est_depo']=="1"){ ?-->
                              <td><!--center><i class="fa fa-circle text-success"></i></center--></td>
                            <!--?php }else{ ?>
                              <td><center><i class="fa fa-circle text-danger"></i></center></td>
                          <!?php } ?-->
                          
                          <td>
                            <center>
                              <!--a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_Update_Deporte<!?php echo $deporte['id_deporte'];?>" ><i class="fa fa-pencil-square-o "></i> Editar</a> &nbsp &nbsp
                              <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_Delete_Deporte<!?php echo $deporte['id_deporte'];?>" ><i class="fa fa-trash-o"></i> Eliminar</a-->
                            </center>
                          </td>
                        </tr>
                        <!--?php 
                          /*MODALES ELIMINAR Y ACTUALIZAR
                          include('../../../templete/pages/registros/modal_update.php');
                          include('../../../templete/pages/registros/modal_eliminar.php');*/
                        } ?-->
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
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
          $('#registros').DataTable({
              "responsive": true,
              "autoWidth":false,
              "pageLength": 10,
              "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "Todos"]],
              "language":{
                  "decimal": "",
                  "emptyTable": "No hay información",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ Inscripciones",
                  "infoEmpty": "Mostrando 0 de 0 Inscripciones",
                  "infoFiltered": "(Filtrado de _MAX_ total Inscripciones)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ Inscripciones",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscador de Inscripción:",
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
  //AGREGAR INSCRIPCIÓN
  include('../../../templete/pages/registros/modal_agregar.php');
?>
