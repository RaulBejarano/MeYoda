<?php  
	session_start();
	$mysqli = new mysqli("mysql.manu.juanlu.is","talentum", "hypernova"); //       
  	//Comprueba la conexion
  	if(!$mysqli->select_db("meyodadb")){
    	$errors[] .= "No se ha podido conectar con la base de datos".'<br> [MYSQL ERROR]:' . $mysqli->error . '<br>';
  	}else{
		$data = json_decode(file_get_contents('http://manu.juanlu.is/meyoda/mvc/controller/controller.php?op=misPujas&id='.$_SESSION['id']));
		$numero_pujas = count($data);
		$i = 0;

		while ($i < $numero_pujas) {
			// echo $data[$i]->id . '<br>';
			// echo $data[$i]->idUsuario . '<br>';
			// echo $data[$i]->idVenta . '<br>';
			// echo $data[$i]->precioPuja . '<br>';

			?>
              <div class="span3 cartaFrame">
                <div class="widget wblack5">
                  <div class="widget-head">
                    <div class="pull-left">
                    <?

                    echo $data[$i]->carta->descripcion ;
                    ?>                 
                    </div>
                    <div class="clearfix"></div>

                  </div>             
                  <div class="widget-content">
                    <div class="padd">
                      <ul class="current-status" style="text-align:center;">
                        <li>
                          <a> <img src="<?php echo $data[$i]->carta->url?>" height="160" width="180"/></a> 
                        </li>
                        <li style="text-align:left;">
                          <?php  
                            echo $data[$i]->carta->descripcion;
                          ?>
                        </li>
                        <hr>
                        Pujando por
                        <span class="label label-success" style="padding:10px;"><strong><?php echo $data[$i]->precioPuja; ?>&#128;</strong></span>

                      </ul>
                    </div>
                  </div>
                </div>                          
              </div>
			<?
			$i++;
		}



  	}






?>