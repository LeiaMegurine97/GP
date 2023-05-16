<?php
  include('../../../config/config.php');
  $no_cuentas = array(); // arreglo para guardar temporalmente los números de cuenta
  $id_deporte=$_POST['id_deporte'];
  //DATOS EXCLUSIVOS DEL LIDER O PARTICIPANTE INDIVIDUAL
  $celular=$_POST['celular_participante'];
  $email=$_POST['email_participante'];
  $nombre_equipo = strtoupper($_POST['nombre_equipo']);
  /* VARIABLES PARA OBTENER FECHA Y HORA ACTUAL*/
  date_default_timezone_set('America/Mexico_City');
  $fecha=date('Y-m-d');
  //PRIMERO SE REALIZA LA INSERCIÓN DE LOS PARTICIPANTES*/
  foreach (array_keys($_POST['noCuenta_participante']) as $key) {
    /*RECEPCION DE VARIABLES DE CADA INTEGRANTE*/
    $no_cuenta = $_POST['noCuenta_participante'][$key];
    $nombre = strtoupper($_POST['nombre_participante'][$key]);
    $apellido_paterno = strtoupper($_POST['apPaterno_participante'][$key]);
    $apellido_materno = strtoupper($_POST['apMaterno_participante'][$key]);
    $fecha_nacimiento = $_POST['fNacimiento_participante'][$key];
    $semestre = $_POST['semestre_participante'][$key];
    $grupo = $_POST['grupo_participante'][$key];
    $dependencia = $_POST['dependencia_participante'][$key];
    $sexo = $_POST['sexo_participante'][$key];
    
    /* GUARDADO TEMPORAL DE LOS NO. CUENTA DE LOS PARTICIPANTES*/
    array_push($no_cuentas, $no_cuenta);
    //REGISTRO EN LA BD DE LA TABLA PARTICIPANTES
    $no_cuenta_BD="";
    $query_busPart = $pdo->prepare("SELECT no_cuenta FROM Participante WHERE no_cuenta= :no_cuenta");
    $query_busPart->bindParam(':no_cuenta',$no_cuenta);
    $query_busPart->execute();
    $res_bus_part = $query_busPart->fetchAll (PDO:: FETCH_ASSOC);
    foreach($res_bus_part as $participante){
      $no_cuenta_BD=$participante['no_cuenta'];
    }
    if($no_cuenta_BD!=$no_cuenta){
      // Verificar si se ha subido una imagen para el integrante actual*/
      if(isset($_FILES['foto_participante']['name'][$key])) {
        $nombre_foto = $no_cuenta . "_Fotografia " . $fecha . " " . date('h.i.s') . ".jpg";
        $location2 = "update_participantes/" . $nombre_foto;
        move_uploaded_file($_FILES['foto_participante']['tmp_name'][$key], $location2);
      } else {
          echo"OCURRIO UN ERROR AL INTENTAR SUBIR LA FOTOGRAFIA DE UNO DE LOS INTEGRANTES, VUELVA A INTENTARLO";
          exit;
      }
      $add_participante = $pdo ->prepare ('INSERT INTO Participante (id_dependencia, no_cuenta, nom_par, appat_par, apmat_par, sexo_par, f_nacimiento, semestre_par, grupo_par, foto_par) VALUES (:id_dependencia, :no_cuenta, :nom_par, :appat_par, :apmat_par, :sexo_par, :f_nacimiento, :semestre_par, :grupo_par, :foto_par)');
      //ASIGNACION DE VARIABLES A PARAMETROS
      $add_participante->bindParam(':id_dependencia',$dependencia);
      $add_participante->bindParam(':no_cuenta',$no_cuenta);
      $add_participante->bindParam(':nom_par',$nombre);
      $add_participante->bindParam(':appat_par',$apellido_paterno);
      $add_participante->bindParam(':apmat_par',$apellido_materno);
      $add_participante->bindParam(':sexo_par',$sexo);
      $add_participante->bindParam(':f_nacimiento',$fecha_nacimiento);
      $add_participante->bindParam(':semestre_par',$semestre);
      $add_participante->bindParam(':grupo_par',$grupo);
      $add_participante->bindParam(':foto_par',$nombre_foto);
      //INFORMA SI SE TUVO QUE REGISTAR O SI YA SE ENCONTRABA EN LA BASE DE DATOS
      if($add_participante->execute()){
      }else{
        echo "ERROR AL INTENTAR REGISTRAR AL PARTICIPANTE. <br>";
      }
    }else{
      echo "El participante ya se encontra registrado en la BD. <br>";
    }
  }
  /*AQUI SE HACE LA SEGUNDA INSERCIÓN, DESPUES DE QUE SE INSERTARON LOS PARTICIPANTES. ES LA INSERCIÓN DEL REGISTRO*/
  $no_cuenta_lider = reset($no_cuentas);
  $nocuenta_lider_BD="";
  $id_lider_BD="";
  $query_busIdLider = $pdo->prepare("SELECT id_participante, no_cuenta FROM Participante WHERE no_cuenta=:no_cuenta");
  $query_busIdLider->bindParam(':no_cuenta', $no_cuenta_lider);
  $query_busIdLider->execute();
  $lideres = $query_busIdLider->fetchAll (PDO:: FETCH_ASSOC);
  foreach($lideres as $lider){
    $nocuenta_lider_BD=$lider['no_cuenta'];
    $id_lider_BD=$lider['id_participante'];
  }
  if($nocuenta_lider_BD==$no_cuenta_lider){
    $id_depo_reg_BD="";
    $id_lid_reg_BD="";
    $query_busRegInsert = $pdo->prepare("SELECT id_deporte, id_participante FROM Registro WHERE (id_deporte= :id_deporte) AND (id_participante= :id_participante)");
    $query_busRegInsert->bindParam(':id_deporte', $id_deporte);
    $query_busRegInsert->bindParam(':id_participante',$id_lider_BD);
    $query_busRegInsert->execute();
    $resRegistro = $query_busRegInsert->fetchAll (PDO:: FETCH_ASSOC);
    foreach($resRegistro as $registro){
      $id_depo_reg_BD=$registro['id_deporte'];
      $id_lid_reg_BD=$registro['id_participante'];
    }
    if(($id_depo_reg_BD==$id_deporte)&&($id_lid_reg_BD==$id_lider_BD)){
      echo "Se encontro el ID del registro en la BD. <br>";
    }else{
      $add_registro = $pdo ->prepare ('INSERT INTO Registro (id_participante, id_deporte, celular, email, nom_equipo, f_registro) VALUES (:id_participante, :id_deporte, :celular, :email, :nom_equipo, :f_registro)');
      /*ASIGNACION DE VARIABLES A PARAMETROS*/
      $add_registro->bindParam(':id_participante',$id_lider_BD);
      $add_registro->bindParam(':id_deporte',$id_deporte);
      $add_registro->bindParam(':celular',$celular);
      $add_registro->bindParam(':email',$email);
      $add_registro->bindParam(':nom_equipo',$nombre_equipo);
      $add_registro->bindParam(':f_registro',$fecha);
      if($add_registro->execute()){
        echo "EL REGISTRO SE REALIZO SATISFACTORIAMENTE. <br>";     
      }else{
        echo "ERROR AL INTENTAR REALIZAR EL REGISTRO. <br>";
        exit;
      }
    }
  }else{
    echo "ERROR AL INTENTAR BUSCAR EL ID DEL LIDER";
    exit;
  }
  //POR ULTIMO SE HACE LA INSERCIÓN EN LA TABLA DE PARTICIPANTES DE EQUIPO
  $id_depo_reg_ft_BD="";
  $id_lid_reg_ft_BD="";
  $query_busReg = $pdo->prepare("SELECT id_deporte, id_participante, id_registro FROM Registro WHERE (id_deporte= :id_deporte) AND (id_participante= :id_participante)");
  $query_busReg->bindParam(':id_deporte', $id_deporte);
  $query_busReg->bindParam(':id_participante',$id_lider_BD);
  $query_busReg->execute();
  $enc_registros = $query_busReg->fetchAll (PDO:: FETCH_ASSOC);
  foreach($enc_registros as $enc_registro){
    $id_depo_reg_ft_BD=$enc_registro['id_deporte'];
    $id_lid_reg_ft_BD=$enc_registro['id_participante'];
    $id_registro_enc_BD=$enc_registro['id_registro'];
  }
  if(($id_depo_reg_ft_BD==$id_deporte)&&($id_lid_reg_ft_BD==$id_lider_BD)){
    foreach($no_cuentas as $no_cuenta) {
      if($no_cuenta!=$no_cuenta_lider){
        $nocuenta_participante_BD="";
        $query_busIdPart = $pdo->prepare("SELECT id_participante, no_cuenta FROM Participante WHERE no_cuenta= :no_cuenta");
        $query_busIdPart->bindParam(':no_cuenta',$no_cuenta);
        $query_busIdPart->execute();
        $enc_idpart = $query_busIdPart->fetchAll (PDO:: FETCH_ASSOC);
        foreach($enc_idpart as $enc_id){
          $id_participante_BD=$enc_id['id_participante'];
          $nocuenta_participante_BD=$enc_id['no_cuenta'];
        }
        if($nocuenta_participante_BD==$no_cuenta){
          $add_equipo = $pdo ->prepare ('INSERT INTO Equipo (id_registro, id_participante) VALUES (:id_registro, :id_participante)');
          /*ASIGNACION DE VARIABLES A PARAMETROS*/
          $add_equipo->bindParam(':id_registro',$id_registro_enc_BD);
          $add_equipo->bindParam(':id_participante',$id_participante_BD);
          if($add_equipo->execute()){
            echo "EL REGISTRO AL EQUIPO DE NO.CUENTA: $no_cuenta, FUE TODO UN EXITO <br>";
          }else{
            echo "NO SE REALIZO EL REGISTRO DE LOS INTEGRANTES DEL EQUIPO";     
            exit;
          }
        }else{
          echo "NO SE ENCONTRO NINGUN ID, QUE CORRESPONDA A ESTE NO. CUENTA: $no_cuenta";
          eixt;
        }
      }
    }
  }else{
    echo "ERROR AL INTENTAR BUSCAR EL ID DELREGISTRO.";
    exit;
  }
?>