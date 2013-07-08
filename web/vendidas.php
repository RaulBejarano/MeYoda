<?php
  session_start();
  if ($session=session_id())
  {            
    $data = json_decode(file_get_contents('http://manu.juanlu.is/meyoda/mvc/controller/controller.php?op=misVentas&id='.$session));
    $i=1;
    while($i <= 8 && isset($data[$i])) {
      if($data[$i]->vendida==1){
          ?>
          <div class="span4">
            <div class="widget wblack5">
              <div class="widget-head">
                <div class="pull-left">
                <?
                  echo $data[i]->carta->nombre;
                ?>                                               
                </div>    
                <div class="clearfix"></div>
              </div>             

              <div class="widget-content">
                <div class="padd">                  
                  <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                  <ul class="current-status">
                    <li>
                                <a href=* > <img src="';

                                echo $data[0]->carta->url;
                                echo '" height="160" width="180"/></a> 
                    </li>
                    <li>
                      Descripcion: <? echo $data[1]->carta->descripcion;?>
                      Precio venta: <? echo 'El valor deseado es: '.$data[$i]->valordeseado;?>                              
                    </li>                         
                  </ul>

                </div>
              </div>

            </div>
                    
          </div>
          <?php  
        }
        $i++;
    }

  if ($desde == 0)
  {
      $desde = $desde + 8;
       ?>
      <a href = <?php echo "misventas.php?desde=".$desde; ?> >[8 siguientes]</a>
    <?php 
  }
  else if ($numeroFilasTotales > 8)
  {
    $OchoSiguientes = $desde + 8;
    $OchoAnteriores = $desde - 8;
    ?>
        <a href = <?php echo "misventas.php?desde=".$OchoAnteriores; ?> >[8 anteriores] </a>
        <a href = <?php echo "misventas.php?desde=".$OchoSiguientes; ?> > [8 siguientes]</a>
    <?php  
  }
  else
  {
    $desde = $desde - 8;
      ?>
        <a href = <?php echo "misventas.php?desde=".$desde; ?> > [8 anteriores]</a>      
      <?php 
  }

}else{//No esta iniciada la sesion
   echo 'Sesion iniciada';
}
?>

    