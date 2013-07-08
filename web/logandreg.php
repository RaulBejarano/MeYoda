<?php  
session_start();
if( isset($_POST['loginForm']) ){
$errors = array();
  $email = "";
  $contrasena = "";

  if ($_POST['inputEmail'] != "") {
    $email=$_POST['inputEmail'];
  }
  if ($_POST['inputPassword'] != "") {
    $contrasena = md5( $_POST['inputPassword'] );
  }          

  //Conectar con la base de datos
  $linkbd = new mysqli("mysql.manu.juanlu.is","talentum", "hypernova"); //
          
  //Comprueba la conexion
  if(!$linkbd->select_db("meyodadb")){

    $errors[] .= "No se ha podido conectar con la base de datos".'<br> [MYSQL ERROR]:' . $linkbd->error . '<br>';

  }else{

    if ($email == '') {

      $errors[] .= "El email está vacío";
    }

    if ($contrasena == '') {

      $errors[] .= "La contrase&ntilde;a está vacía";
    }

    
    if (count($errors) == 0) {

      //comprobacion de user mas pass
      $query = $linkbd->query("SELECT * FROM Usuario WHERE email = '$email' AND contrasena = '$contrasena' ") or die($linkbd->error);
      if ($query) {


        if ($linkbd->affected_rows > 0) {
      

          $data = mysqli_fetch_array($query);
          // $_SESSION["s_email"] = $data['email'];
          // echo "Bienvenido ".$data['nombre']." !";
          $_SESSION['email']  = $data['email'];
          $_SESSION['nombre'] = $data['nombre'];
          $_SESSION['id']     = $data['id'];            
          echo '<meta http-equiv="refresh" content="0;url=http://manu.juanlu.is/meyoda/home.php" >';

        }else{
          $errors[] .= "Credenciales incorrectos";
        }
      }


    } 

    if(count($errors) > 0){
      ?>
        <div class="modal fade alert-error alert-danger">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4><strong>Error en el formulario!</strong></h4>
          </div>
          <div class="modal-body">
          
          <ul>
          <?
            foreach ($errors as $errorLine) {
              echo '<li>'.$errorLine.'</li>';
            }
          ?>
          </ul>
          </div>
          <div class="modal-footer">
            <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
          </div>
        </div>         
      <?
    }          
  }
}

if( isset($_POST['nuevoRegistro']) ){
  $registerErrors = array();


  $nombre       = "";
  $apellidos    = "";
  $email        = "";
  $contrasena   = "";
  $contrasena2   = "";

  if ($_POST['nombre'] != "") {
    $nombre=$_POST['nombre'];
  }else{
    $registerErrors[] .= "Nombre incompleto";
  }

  if ($_POST['apellidos'] != "") {
    $apellidos=$_POST['apellidos'];
  }else{
    $registerErrors[] .= "Apellidos incompletos";
  }

  if ($_POST['email'] != "") {
    $email=$_POST['email'];
  }else{
    $registerErrors[] .= "Email incompleto";
  }
  if ($_POST['pss'] != "") {
    $contrasena = md5( $_POST['pss'] );
  }else{
    $registerErrors[] .= "Contrase&ntilde;a incompleta";
  }            

  if ($_POST['pss2'] != "") {
    $contrasena2 = md5( $_POST['pss2'] );
  }else{
    $registerErrors[] .= "Sin confirmar la contrase&ntilde;a";
  }


  if ($contrasena != "" && $contrasena2 != "" && $contrasena2 != $contrasena) {
    $registerErrors[] .= "Las contrase&ntilde;as no coinciden";   
  }

  //Conectar con la base de datos
  $linkbd = new mysqli("mysql.manu.juanlu.is","talentum", "hypernova"); //
          
  //Comprueba la conexion
  if(!$linkbd->select_db("meyodadb")){

    $errors[] .= "No se ha podido conectar con la base de datos".'<br> [MYSQL ERROR]:' . $linkbd->error . '<br>';

  }else if( count($registerErrors) == 0 ){
    
    if (count($errors) == 0) {

      //comprobacion de user mas pass
      $query = $linkbd->query("INSERT into Usuario (nombre,apellidos,email,contrasena) VALUES ('$nombre','$apellidos','$email' , '$contrasena') ") or die($linkbd->error);
      if ($query) {

        ?>
            <div class="modal fade alert-info">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4><strong>Registrado!</strong></h4>
              </div>
              <div class="modal-body">
                <p>Ya puedes acceder a nuestro portal con tu usuario y contrase&ntilde;a</p>
              </div>
              <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
              </div>
            </div>
            <script type="text/javascript">
              $('#inputEmail').focus();
            </script>
        <?  




      }


    } else{
      ?>

        <div class="modal fade alert-error alert-danger">
          <div class="modal-header">
            <button onclick="regClick();" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4><strong>Error en el formulario!</strong></h4>
          </div>
          <div class="modal-body">
          
          <ul>
          <?
            foreach ($errors as $errorLine) {
              ?>
              <li>
                <?php echo $errorLine; ?>
              </li>
              <?
            }
          ?>
          </ul>
          </div>
          <div class="modal-footer">
            <a href="#" onclick="regClick();" data-dismiss="modal" class="btn">Close</a>
          </div>
        </div>         
      <?
    }          
  }

  if ( count($registerErrors) > 0) {
    ?>
    <div class="modal fade alert-error alert-danger">
      <div class="modal-header">
        <button type="button" onclick="regClick();" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4><strong>Error!</strong></h4>
      </div>
      <div class="modal-body">
      
      <ul>
      <?
      foreach ($registerErrors as $regerror ) {
        ?>
        <li>
          <?php echo $regerror; ?>
        </li>
        <?
      }
      ?>
      </ul>
      </div>
      <div class="modal-footer">
        <a href="#" onclick="regClick();" data-dismiss="modal" class="btn">Close</a>
      </div>
    </div>   
     

    <?

  }
}

?>