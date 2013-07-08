<?php
  session_start();
  if ($session=session_id())
  {
                 
    $data = json_decode(file_get_contents('http://manu.juanlu.is/meyoda/mvc/controller/controller.php?op=misVentas&id='.$session));
    $i=1;
    while($i <= 8 && isset($data[$i])) {
                     if($data[$i]->vendida==0){
                          echo ' 
        <div class="span4">

                    <div class="widget wblack5">

                      <div class="widget-head">
                        <div class="pull-left">';

                           echo $data[i]->carta->nombre;
                            
                          
                      
                             echo'                  </div>

                     
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
                              Descripcion:' ;
                              echo $data[1]->carta->descripcion;

                              echo '  
                              <br>
                              Precio venta: ';
                            
                                 echo 'El valor deseado es: '.$data[$i]->valordeseado;
                              
                              
                              echo'
                            </li>                         
                          </ul>

                        </div>
                      </div>

                    </div>
                    
                  </div>';
                }
            $i++;
          }

      if ($desde == 0 )
      {
        $desde = $desde + 8;
        echo "<a href = misventas.php?desde=$desde>[8 siguientes]</a>";
      }
      else if ($numeroFilasTotales > 8)
      {
          $OchoSiguientes = $desde + 8;
          $OchoAnteriores = $desde - 8;
          echo "<a href = misventas.php?desde=$OchoAnteriores>[8 anteriores] </a>";
          echo "<a href = misventas.php?desde=$OchoSiguientes> [8 siguientes]</a>";
      }
      else
      {
          $desde = $desde - 8;
          echo "<a href = misventas.php?desde=$desde>[8 anteriores]</a>";
      }

    }//fin del if primero
    else{//No esta iniciada la sesion
        echo 'Sesion iniciada';
    }
  ?>
