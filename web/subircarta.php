<?php  
// if(isset($_POST['FormSubir']) ){

//   $nombre       = $_POST['name'];
//   $descripcion  = $_POST['descripcion'];
//   $url          = $_POST['url'];
//   $precio       = $_POST['precio'];
  
//   if ($nombre == '') {
//     echo 'No puedes dejar el nombre en blanco.';
//     return;
//   }
//   else if ($url == '') {
//     echo 'No puedes dejar la url en blanco.';
//     return;
//   }
//   else if ($precio == '') {
//     echo 'No puedes dejar el precio en blanco.';
//     return;
//   }
//   else{
//       // $linkbd = new mysqli("mysql.manu.juanlu.is","talentum","hypernova", "meyodadb");    
//       // if($linkbd->select_db("meyodadb")){    
//       //   $sql="INSERT INTO Carta (nombre, descripcion, url) VALUES ($nombre, $descripcion, $url)";
//       //   $result = $linkbd->query($sql);
//       // $data = json_decode(file_get_contents('http://manu.juanlu.is/meyoda/mvc/controller/controller.php?op=subirCarta&nombre='.$nombre.'&descripcion='.$descripcion.'&url='.$url.'&precio='.$precio));
//       echo json_decode(file_get_contents('http://manu.juanlu.is/meyoda/mvc/controller/controller.php?op=nuevaVenta&nombre='.$nombre.'&descripcion='.$descripcion.'&url='.$url.'&precio='.$precio));
      
//   }
                    
             
// }    

  $mysqli = new mysqli("mysql.manu.juanlu.is","talentum", "hypernova"); //
          
  //Comprueba la conexion
  if(!$mysqli->select_db("meyodadb")){

    $errors[] .= "No se ha podido conectar con la base de datos".'<br> [MYSQL ERROR]:' . $linkbd->error . '<br>';

  }else{
    
    $result = $mysqli->query('SELECT * FROM Carta ');
    if ($result) {
        ?>
        <div class="container">
          <div class="span12" style="width:100%;">
            <?      
            while($row = mysqli_fetch_array($result))
            { 
              ?>
              <div class="span3">
                <div class="widget wblack5">
                  <div class="widget-head">
                    <div class="pull-left">
                    <?
                    echo $row['nombre'] ;
                    ?>         
                    </div>         
                    <div class="clearfix"></div>
                  </div>             
                  <div class="widget-content">
                    <div class="padd">
                      <ul class="current-status">
                        <li><a> <img src="<?php echo $row['url'];?>" height="160" width="180"/></a></li>
                        <li>
                         Descripcion:
                          <?
                            echo $row['descripcion'] ;
                          ?>
                        </li> 
                        <form>
                          Precio: <input id="<?php echo "precio-".$row['id']; ?>" name="precio" style="width:50px;margin:5px;" size="4" maxlength="4"><strong>&#128;</strong><br> 
                          <a id="" href="#addCardModal" data-toggle="modal" class="btn btn-inverse addCard"   data-carta-id="<?php echo $row['id']; ?>" data-carta-nombre="<?php echo $row['nombre']; ?>">A&ntilde;adir a Mazo</a>
                        </form>                                                  
                      </ul>
                    </div>
                  </div>
                </div>     
              </div>              
<!--               <div class="span3 cartaFrame">
                <div class="widget wblack5">
                  <div class="widget-head">
                    <div class="pull-left"> -->
                    <?

                    // echo $row['nombre'] ;
                    ?>                 
<!--                     </div>
                    <div class="clearfix"></div>

                  </div>             
                  <div class="widget-content">
                    <div class="padd">
                      <ul class="current-status" style="text-align:center;">
                        <li>
                          <a> <img src="<?php 
                          // echo $row['url']
                          ?>" height="160" width="180"/></a> 
                        </li>
                        <li style="text-align:left;"> -->
                          <?php  
                            // echo $row['descripcion'];
                          ?>
  <!--                       </li> 
                        <form>
                          Precio: <input id="
                          // <?php 
                          // echo "precio-".$row['id']; 
                          ?>" name="precio" style="width:50px;margin:5px;" size="4" maxlength="4"><strong>&#128;</strong><br> 
                          <a id="" href="#addCardModal" data-toggle="modal" class="btn btn-inverse addCard"   data-carta-id="
                          <?php 
                          // echo $row['id']; 
                          ?>" data-carta-nombre="

                          <?php 
                          // echo $row['nombre']; 
                          ?>">A&ntilde;adir a Mazo</a>
                        </form>                        
                      </ul>
                    </div>
                  </div>
                </div>                          
              </div> -->
              <?
            }
            ?>
          </div>
        </div>
        <?
    }
  }        

?>
<div class="modal hide fade" id="addCardModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Carta a&ntilde;adida</h3>
  </div>
  <div id="modal-body-addCard" style="padding:20px;">
    La carta seleccionada ha sido a&ntilde;adida a tus ventas.
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
  </div>
</div>
<script type="text/javascript">

</script>
  <!-- <div class="span4">
    <div class="widget wblue">
      <div class="widget-head">
        <div class="pull-left">
                          Subir carta a la base de datos
        </div>     
        <div class="clearfix"></div>
      </div>             

      <div class="widget-content"> 
        <div class="padd">
          <ul class="current-status">
            <li>
              <form class="myForm" action="" method="post"> 
                Nombre: <input type="text" name="name" /> 
                Descripcion: <textarea name="descripcion"></textarea> <br>
                Url: <br><input type='text' name="url" id="urlCarta"></input>
                Precio: <input type="text" name="precio"></input>  
                <input class="button buttonUpload" type="submit" name="FormSubir" value="Subir!" /> 
              </form>
            </li>                         
          </ul>

        </div>
      </div>

    </div>
               
  </div>
  <div class="span4">
    <img src="" height="160" width="180" id="dynamicUrlLoad">
    <script type="text/javascript">
    $('#urlCarta').keyUp(function(){
      $('#dynamicUrlLoad').attr('src',$(this).val());
    });
    </script>
  </div> -->


 



