<?php 
session_start();
 ?>
<html>
<head>
	<title>MeYoda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/bootstrap-responsive.css" rel="stylesheet" > 
    <link rel="shortcut icon" href="img/logos/logo_thumbnail.png">
    <style type="text/css">
    	body {
    		font-size: 13px;
    		line-height: 23px;
    		color: #666;

        background-color: black;
        background-image: url('img/bgrounds/yoda_bground.jpg');
        background-position: 0 10px;
        background-repeat: no-repeat;
        background-size: 100% auto;
    	}	
      .login-btns{
        margin-top: 10px;
        font-size: 14px;
        padding: 10px 15px;
/*        border: 2px solid #fff;
*/        border: 2px solid #ccc;
        display: inline-block;
/*        color: #fff;
*/        
        -webkit-border-radius: 9px;
        -moz-border-radius: 9px;
        border-radius: 9px;

        background-color: #eee;
      }
      .login-btns:hover {
        background: #fff;
        color: rgb(219, 82, 47);
      }
      .login-btns button:hover {
        text-decoration: none;
      }

      #logRegDiv{
        position: absolute;
        right:50px;
        top: 10px;
        width: 400px;

      }

      .form-horizontal .control-label .yodaLogForm{
        width: 100px;

      }

      #loginDiv{

/*        background-image: url('img/bgrounds/lightspeed.jpg');
        background-size: 100% 100%;
        background-repeat: no-repeat;*/
        background-color: #111;

        padding-top: 35px;
      }

      #loginDiv label{
        color: white;
        text-align: center;

      }

      #logRegDiv input{

        padding: 18px;
        background-color: #555;
        border: none;
        text-align: center;
        color: white;  
        border-radius: 0;

        height: 33px;
        width: 300px;
        line-height: normal;
        padding-left: 25px;

        border: 1px solid #4E4E4E;             
      }

      #logRegDiv .control-label {
        text-align: center;
      }

      #registerDiv{

        padding-top: 35px;
      }
    </style>



</head>

<body>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/meyoda.js"></script> 

  <div class="container">
    <div id="logRegDiv" class="pull-right" style="
      background-color: #111;">
      <div id="loginDiv">
        <?php 
        if( isset($_POST['loginForm']) ){
          $email=$_POST['inputEmail'];
          $contrasena=$_POST['inputPassword'];

        

        //Conectar con la base de datos
          $linkbd = new mysqli("mysql.manu.juanlu.is","talentum", "hypernova"); //
          
        //Comprueba la conexion
          if(!$linkbd->select_db("meyodadb")){

            print("No se ha podido conectar con la base de datos");
            echo '[MYSQL ERROR]:' . $linkbd->error . '<br>';
          }
          else{


            if ($email == '') {
              echo 'No puedes dejar el email en blanco.';
              return;
            }

            if ($contrasena == '') {
              echo 'No puedes dejar la contrase&ntilde;a en blanco.';
              return;
            }

            //comprobacion de user mas pass
              $query = $linkbd->query("SELECT email,contrasena FROM Usuario WHERE email = '$email'") or die($linkbd->error);
              $data = mysqli_fetch_array($query);
              if($data['contrasena'] != $contrasena) {
                echo "Login incorrecto";
              }else{
                $query = $linkbd->query("SELECT email, contrasena FROM Usuario WHERE email = '$email'") or die($linkbd->error);
                $row = mysqli_fetch_array($query);
                $_SESSION["s_username"] = $row['email'];
                echo "Has sido logueado correctamente ".$_SESSION['s_username']." y puedes acceder al index.php.";
                //Redireccion
                // print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=http://localhost/ejemplo/ejemplo.php'>";
              }            
          }
        }

         ?>
        <form class="form-horizontal" style="text-align:center;" action="" method="post">
          <div class="control-group">
            <input type="text" name="inputEmail" placeholder="Email">          
          </div>
          <div class="control-group">
            <input type="password" name="inputPassword" placeholder="Contrase&ntilde;a">
          </div>
          <button name="loginForm" class="btn btn-inverse" type="submit">Iniciar Sesi&oacute;n</button>
          <br>
          <a href="regClick();return false;">&iquest;No tienes cuenta? Reg&iacute;strate</a>
        </form>
        <div id="loginNotificaciones"></div>
      </div>
      <div id="registerDiv" class="hide">
        <form class="form-horizontal" style="text-align:center;">
          <div class="control-group">
            <input type="text" name="nombre" placeholder="Nombre">          
          </div>
          <div class="control-group">
            <input type="text" name="apellidos" placeholder="Apellidos">          
          </div>
          <div class="control-group">
            <input type="text" name="email" placeholder="Email">          
          </div>                    
          <div class="control-group">
            <p><input type="password" name="pss" placeholder="Contrase&ntilde;a"></p>
             
            <input type="password" name="pss2" placeholder="Confirmar">
          </div>


        </form>
        <div id="regNotificaciones"></div>
      </div>
      <p style="text-align:center;">
<!--         <a name="loginForm" class="btn btn-inverse" onclick="loginClick(); return false;" type="submit">Iniciar Sesi&oacute;n</a> -->
        <a class="btn btn-inverse" onclick="regClick();return false;">Reg&iacute;strate</a>
      </p>

    </div>
  </div>




</body>


</html>

