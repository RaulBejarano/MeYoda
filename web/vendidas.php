<html>
<head>
  <title>MeYodaVentas</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 
    <link href="style/style.css" rel="stylesheet" media="screen"> 
    <style type="text/css">

  .navbar .container {
    width: 97% !important;
  }
  .sidebar {
    width: 230px;
    float: left;
    display: block;
    background: #111;
    color: #eee;
    position: relative;
  }

  .sidebar .sidebar-dropdown {
  display: none;
  }
  .sidebar .sidebar-inner {
  display: block;
  width: 100%;
  margin: 0 auto;
  position: absolute;
  z-index: 60;
  background: #111;
  }
  .sidebar .sidebar-widget {
  padding: 10px 5px;
  }
  .sidebar ul {
  padding: 0px;
  margin: 0px;
  list-style-type: none;
  }

  body {
    font-size: 13px;
    line-height: 23px;
    color: #666;
    background: #FFFFFF;
  } 
    </style>


</head>
  


    <body>
 
  

              <?php
              sesion_start();
                if ($session=session_id())
               {
                 
                    $data = json_decode(file_get_contents('http://manu.juanlu.is/meyoda/mvc/controller/controller.php?op=misVentas&id='.$session));


                   $i=1;
                   while($i <= 8 && isset($data[$i])) {
                     if($data[$i]->vendida==1){
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
    else{//No esta iniciada la sesion
        echo 'Sesion iniciada';
    }
                  ?>

    

</body>

</html>