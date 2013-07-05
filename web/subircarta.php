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
  .button{
    margin-top: 10px;
    font-size: 14px;
    padding: 10px 15px;
/*        border: 2px solid #fff;
*/  border: 2px solid #ccc;
    display: inline-block;
/*        color: #fff;
*/        
    -webkit-border-radius: 9px;
    -moz-border-radius: 9px;
    border-radius: 9px;
    background-color: #eee;
  }
  .button:hover{
    background: #fff;
    color: rgb(219, 82, 47);
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
        if(!isset($_POST['FormSubir']) ){
          $nombre=$_POST['nombre'];
          $descripcion=$_POST['descripcion'];
          $url=$_POST['url'];
          $precio=$_POST['contrasena'];
        
        
        }
          else{

            if ($nombre == '') {
              echo 'No puedes dejar el nombre en blanco.';
              return;
            }

            else if ($url == '') {
              echo 'No puedes dejar la url en blanco.';
              return;
            }
            else if ($precio == '') {
              echo 'No puedes dejar el precio en blanco.';
              return;
            }
            else{
              $data = json_decode(file_get_contents('http://manu.juanlu.is/controler.php?op=subirCarta&nombre='.$nombre.'&descripcion='.$descripcion.'&url='.$url.'&precio='.$precio));
            }
                    
             
         }            
        
        

         ?>
          <div class="span4">
              <div class="widget wblue">

                <div class="widget-head">
                  <div class="pull-left">
                        Subir carta a la base de datos
                  </div>

               
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                      <li>
                          <form class="myForm" id="FormSubir" action="subircarta.php" method="post"> 
                             Nombre: <input type="text" name="name" /> 
                             Descripcion: <textarea name="descripcion"></textarea> <br>
                             Url: <br><input type='text' name="url"></input>
                             Precio: <input type="text" name="precio"></input>  
                            <input class="button" type="submit" value="Subir!" /> 
                          </form>
                      </li>                         
                    </ul>

                  </div>
                </div>

              </div>
              
            </div>
        



  <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>

    <script src="js/fullcalendar.min.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/excanvas.min.js"></script>
    <script src="js/jquery.flot.js"></script>
    <script src="js/jquery.flot.resize.js"></script>
    <script src="js/jquery.flot.pie.js"></script>
    <script src="js/jquery.flot.stack.js"></script>
    <script src="js/jquery.gritter.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/jquery.cleditor.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/jquery.toggle.buttons.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/charts.js"></script>

</body>


</html>

