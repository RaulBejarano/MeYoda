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
	<!--Variables php    -->
	<?php
<<<<<<< HEAD
	$linkbd=mysql_connect("mysql.manu.juanlu.is","talentum", "hypernova"); //Conexion BD
=======
	$linkbd=mysqli("mysql.manu.juanlu.is","talentum", "hypernova"); //Conexion BD
>>>>>>> 1ae3ea63072d139ab31376cbf79c8e8fbb053c71
	$linkbd1=mysql_select_db("meyodadb");
	
	?>
	
<<<<<<< HEAD

                  <?php
                    $resultado = mysql_query("select nombre from Carta", $linkbd)
                      or die("Error, la consulta especificada no se ha llevado a cabo con éxito");

                    $descripcion = mysql_query("select descripcion from Carta", $linkbd)
                      or die("Error, la consulta de la descripcion no se ha llevado a cabo con éxito");

                    $url = mysql_query("select url from Carta",$linkbd)
                      or die("Error, la consulta de la url no se ha llevado a cabo con éxito");
                    
                
                
                   while($fila = mysql_fetch_array($resultado)){
                   echo ' 
  <div class="span4">
=======
	
	<div class="span4">

              <div class="widget wblack5">

                <div class="widget-head">
                  <div class="pull-left">Yoda TodoPoderoso</div>
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                      <li>
                      		<a href=* > <img src="http://www.wizards.com/global/images/swtcg_expansion_aotc_famous1LargePic_en.jpg" height="160" width="180"/></a> 
                      </li>
                      <li>
                        Precio estimado: 	
                      	<br>
                        Demandas: 
                      </li> 		                    
                    </ul>

                  </div>
                </div>

              </div>
              
	</div>
		<div class="span4">
>>>>>>> 1ae3ea63072d139ab31376cbf79c8e8fbb053c71

              <div class="widget wblack5">

                <div class="widget-head">
<<<<<<< HEAD
                  <div class="pull-left">';

                      echo $fila['nombre'] ;
                    
                
                       echo'                  </div>

               
=======
                  <div class="pull-left">Yoda TodoPoderosa</div>
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                      <li>
                      		<a href=* > <img src="http://www.wizards.com/global/images/swtcg_expansion_anewhope_famous1LargePic_en.jpg" height="160" width="180"/></a> 
                      </li>
                      <li>
                        Precio estimado: 	
                      	<br>
                        Demandas: 
                      </li> 		                    
                    </ul>

                  </div>
                </div>

              </div>
              
	</div>
	<div class="span4">

              <div class="widget wblack5">

                <div class="widget-head">
                  <div class="pull-left">Yoda TodoPoderoso</div>
>>>>>>> 1ae3ea63072d139ab31376cbf79c8e8fbb053c71
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                      <li>
<<<<<<< HEAD
                          <a href=* > <img src="';

                          $url1 = mysql_fetch_array($url);
                          echo $url1['url'];
                          echo '" height="160" width="180"/></a> 
                      </li>
                      <li>
                        Descripcion:' ;
                        $descrip = mysql_fetch_array($descripcion);
                        echo $descrip['descripcion'];

                        echo '  
                        <br>
                        Demandas: 
                      </li>                         
=======
                      		<a href=* > <img src="http://1.bp.blogspot.com/-BhVtkyOUk4Y/T1DcLefgqMI/AAAAAAAAHYI/DIYnLnjuxAg/s320/sw1.jpg" height="160" width="180"/></a> 
                      </li>
                      <li>
                        Precio estimado: 	
                      	<br>
                        Demandas: 
                      </li> 		                    
>>>>>>> 1ae3ea63072d139ab31376cbf79c8e8fbb053c71
                    </ul>

                  </div>
                </div>

              </div>
              
<<<<<<< HEAD
            </div>';
          }
                  ?>

		
=======
	</div>
	<div class="span4">

             <div class="widget wblack5"> 

                <div class="widget-head">
                  <div class="pull-left">Yoda TodoPoderose</div>
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                      <li>
                      		<a href=* > <img src="http://www.sonyinsider.com/wp-content/uploads/2008/12/dark_lightning.jpg" height="160" width="180"/></a> 
                      </li>
                      <li>
                        Precio estimado: 	
                      	<br>
                        Demandas: 
                      </li> 		                    
                    </ul>

                  </div>
                </div>

              <!-- </div> -->
              
	</div>
>>>>>>> 1ae3ea63072d139ab31376cbf79c8e8fbb053c71



</html>