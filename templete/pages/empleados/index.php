<?php
  include('../../../config/config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Garzas de Plata | Usuarios </title>
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
                Usuarios
                <small>Gestión</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $URL;?>/templete/pages/panel.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active"><a href="#">Usuarios</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">            
            <div class="col-xs-12" style=" margin: 10px;">
              <div class="col-xs-10"></div>
                <div class="col-xs-2">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_Add_Empleado">
                    <i class="fa fa-plus"></i> <span>&nbsp Nuevo Usuario</span>
                  </button>
                </div>
              </div>
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header" style="background-color:#800101">
                    <h3 class="box-title" style="color:#fff">Usuarios Registrados</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <table id="empleados" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th><center>#</center></th>
                          <th><center>Cargo</center></th>
                          <th><center>Dependencia</center></th>
                          <th><center>No. Empleado</center></th>
                          <th><center>Nombre</center></th>
                          <th><center>Sexo</center></th>
                          <th><center>Estado</center></th>
                          <th><center>Acción</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query_empleados=$pdo->prepare("SELECT Empleado.id_empleado, Cargo.cargo, Dependencia.dependencia, Empleado.no_empleado, Empleado.nom_emp, Empleado.appat_emp, Empleado.apmat_emp, Empleado.sexo_emp, Empleado.nip, Empleado.est_emp FROM Empleado INNER JOIN Cargo ON Empleado.id_cargo=Cargo.id_cargo INNER JOIN Dependencia ON Empleado.id_dependencia=Dependencia.id_dependencia");
                          $query_empleados->execute();
                          $empleados = $query_empleados->fetchAll (PDO:: FETCH_ASSOC);
                          foreach($empleados as $empleado){ ?>
                          <tr>
                            <th><center><?php echo $empleado['id_empleado'];?></center></th>
                            <td><center><?php echo $empleado['cargo'];?></center></td>
                            <td><center><?php echo $empleado['dependencia'];?></center></td>
                            <td><center><?php echo $empleado['no_empleado'];?></center></td>
                            <td><center><?php echo $empleado['nom_emp'];?> <?php echo $empleado['appat_emp'];?> <?php echo $empleado['apmat_emp'];?></center></td>
                            <td><center><?php echo $empleado['sexo_emp'];?></center></td>
                            <?php
                              if($empleado['est_emp']=="1"){ ?>
                                <td><center><i class="fa fa-circle text-success"></i></center></td>
                              <?php }else{ ?>
                                <td><center><i class="fa fa-circle text-danger"></i></center></td>
                            <?php } ?>
                            
                            <td>
                              <center>
                                <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_Update_Empleado<?php echo $empleado['id_empleado'];?>" ><i class="fa fa-pencil-square-o "></i> Editar</a> &nbsp &nbsp
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_Delete_Empleado<?php echo $empleado['id_empleado'];?>" ><i class="fa fa-trash-o"></i> Eliminar</a>
                              </center>
                            </td>
                          </tr>
                        <?php 
                          //MODALES ELIMINAR Y ACTUALIZAR
                          include('../../../templete/pages/empleados/modal_eliminar.php');
                          include('../../../templete/pages/empleados/modal_update.php');
                          
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
          $('#empleados').DataTable({
            "fixedHeader": true,
              "responsive": true,
              "autoWidth":false,
              "pageLength": 10,
              "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "Todos"]],
              "language":{
                  "decimal": "",
                  "emptyTable": "No hay información",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                  "infoEmpty": "Mostrando 0 de 0 Usuarios",
                  "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ Usuarios",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscador de Usuario:",
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
  //AGREGAR USUARIO
  include('../../../templete/pages/empleados/modal_agregar.php');
?>