 <?php
  $desde = $_GET["desde"];
  
  if (!isset($desde)) $desde = 0;

  // $mysqli = new mysqli("mysql.manu.juanlu.is","talentum","hypernova", "meyodadb");    
  // if(!$mysqli->select_db("meyodadb")){ 
  //   exit;
  // }
  
  $linkbd=mysql_connect("mysql.manu.juanlu.is","talentum", "hypernova"); //Conexion BD
  $linkbd1=mysql_select_db("meyodadb");
  
  $resultado = mysql_query("select nombre from Carta limit $desde, 8", $linkbd)
                      or die("Error, la consulta especificada no se ha llevado a cabo con éxito");

  $descripcion = mysql_query("select descripcion from Carta", $linkbd)
                      or die("Error, la consulta de la descripcion no se ha llevado a cabo con éxito");

  $url = mysql_query("select url from Carta",$linkbd)
                      or die("Error, la consulta de la url no se ha llevado a cabo con éxito");

  $numeroFilasTotales = mysql_num_rows($resultado);
        
  $i=1;
                  
                   
  // while($i <= 8) {
    ?>
<!--     <div id="myCarousel" class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="active item">…</div>
        <div class="item">…</div>
        <div class="item">…</div>
      </div>

      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div> -->    
    <div class="span4">
      <div class="widget wblack5">
        <div class="widget-head">
          <div class="pull-left">
          <?
            $fila = mysql_fetch_array($resultado);
            echo $fila['nombre'] ;
          ?>                 
          </div>
          <div class="clearfix"></div>

        </div>             
        <div class="widget-content">
          <div class="padd">
            <ul class="current-status" style="text-align:center;">
              <li>

                <a> <img src="<?php $url1 = mysql_fetch_array($url);
                                            echo $url1['url']; ?>" height="160" width="180"/></a> 
              </li>
              <li style="text-align:left;">
                <?php  
                  $descrip = mysql_fetch_array($descripcion);
                  echo $descrip['descripcion'];
                ?>
              </li>                         
            </ul>

          </div>
        </div>

      </div>
                
    </div>
    <?
  //   $i++;
  // }

          if ($desde == 0)
    {
      $desde = $desde + 8;
      echo "<a href = ventas.php?desde=$desde>[8 siguientes]</a>";
    }
    else if ($numeroFilasTotales > 8)
      {
        $OchoSiguientes = $desde + 8;
        $OchoAnteriores = $desde - 8;
        echo "<a href = ventas.php?desde=$OchoAnteriores>[8 anteriores] </a>";
        echo "<a href = ventas.php?desde=$OchoSiguientes> [8 siguientes]</a>";
      }
      else
      {
        $desde = $desde - 8;
        echo "<a href = ventas.php?desde=$desde>[8 anteriores]</a>";
      }
                  ?>

