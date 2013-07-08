<?php
  if ($session = $_SESSION['id'])
  {
    // $session = 9;
    $data = json_decode(file_get_contents('http://manu.juanlu.is/meyoda/mvc/controller/controller.php?op=misVentas&id='.$session));
    /*    echo $data[0]->carta->id;
      echo $data[0]->carta->nombre;
      echo $data[0]->carta->url;
      echo $data[1]->carta->id;
      echo $data[1]->carta->nombre;
      echo $data[1]->carta->url;
    //echo $myArray['payload']['ign'];*/

                   $i=1;
                   ?>
<div class="container"><div class="span11" style="width:100%;">
  <?
  while($i <= 8) {
  ?>
  <div class="span3">
    <div class="widget wblack5">
      <div class="widget-head">
        <div class="pull-left">
        <?php
        echo $data[$i]->carta->nombre;                
        ?>             
        </div>

               
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                      <li>
                          <a href=* > <img src="

                          <?php

                         echo $data[$i]->carta->url;
                         ?>

                          " height="160" width="180"/></a> 
                      </li>
                      <li>


                        <span style="text-align:center;">Descripcion</span>
                        <hr>


                        <?php                        
                          echo $data[$i]->carta->descripcion;
                        ?> 

                        <br>
                        Vendida por
                        <span class="label label-success" style="padding:10px;">                         
                        <?php
                        
                        // echo $data[$i]->carta->precio;
                        ?>
                        ? &#128;
                        </span>                         
                      </li>                         
                    </ul>

                  </div>
                </div>

              </div>
              
            </div>
            <?php 
            $i++;
          }
          ?>
        </div></div>
          <?

  if ($desde == 0)
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
                  
?>

    
