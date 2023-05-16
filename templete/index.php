<?php
  include('../config/config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Garzas de Plata - Login</title>
    </head>
    <body>
      <div id="contenedor">
        <div class="login-box">
            <img class="imagenLogo" src="<?php echo $URL;?>/dist/img/Garza.png" alt="Logo Garza">
            <h1> LOGIN </h1>
            <!--form method = "POST" action ="controller_login.php"-->
              <!--NO CUENTA -->
              <label for="NoEmpleado">No. Cuenta</label>
              <input name="txtNoCuenta" type="text" onkeypress="return onlyNumberKey(event)" minlegth="6" maxlength="6" placeholder="Ingresa tu No. Empleado" required>
                    
              <!-- NIP -->
              <label for="Nip">NIP</label>
              <input name="txtNip" type="password" onkeypress="return onlyNumberKey(event)" minlegth="4" maxlength="4" placeholder="Ingresa tu NIP" required>
            
              <input type="submit" value="Iniciar Sesión" >
              <a class="underlineHover" href="<?php echo $URL;?>/templete/pages/panel.php">¿Olvidaste tu NIP?</a><br>
            <!--/form-->
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
      <!--ESTILOS DEL LOGIN-->
      <style>
        html, body {
          height: 100%;
        }

        body{
            margin: 0;
            padding: 0;
            background: #F5F5F5;
            font-family: 'Merriweather', sans-serif;
            /*height: 100vh;*/
            text-align: center;
        }

        .login-box {
            width: 320px;
            height: 420px;
            background: #fff;
            border-radius: 10px 10px 10px 10px;
            color: #201f1d;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            padding: 70px 30px;
        }

        .login-box .imagenLogo{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: calc(50% - 50px);
        }

        .login-box h1{
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
        }

        .login-box label{
            margin: 0;
            padding: 0;
            font-weight: bold;
            display: block;
        }

        .login-box input{
            width: 100%;
            margin-bottom: 20px;
        }

        .login-box input[type="text"], .login-box input[type="password"]{
            border: none;
            border-bottom: 1px solid #575756;
            background: transparent;
            outline: none;
            color: #0d0d0d;
            height: 40px;
            font-size: 16px;
            background-color: #f6f6f6;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            margin: 10px;
            width: 85%;
            border: 2px solid #f6f6f6;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;

        }

        .login-box input[type="submit"] {
            font-family: 'Merriweather', sans-serif;
            border: none;
            outline: none;
            text-decoration: none;
            height: 40px;
            width: 180px;
            background: #575756;
            color: #fff;
            font-size: 16px;
            margin: 10px;
            border-radius: 30px;    
            text-align: center;
            display: inline-block;
            text-transform: uppercase;
            -webkit-border-radius: 15px 5px 15px 5px;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .login-box input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
            background-color: #ba0f16;
        }
          
        .login-box input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
            -moz-transform: scale(0.95);
            -webkit-transform: scale(0.95);
            -o-transform: scale(0.95);
            -ms-transform: scale(0.95);
            transform: scale(0.95);
        }

        .login-box a {
            color: #511013;
            display:inline-block;
            text-decoration: none;
            font-weight: 400;
        }
          
        .underlineHover:after {
            display: block;
            left: 0;
            bottom: -10px;
            width: 0;
            height: 2px;
            background-color: #E8641C;
            content: "";
            transition: width 0.2s;
          }
          
          .underlineHover:hover {
            color: #0d0d0d;
          }
          
          .underlineHover:hover:after{    
            width: 100%;
          }

          #contenedor{
            width: 100%;
          }
      </style>
    </body>
</html>