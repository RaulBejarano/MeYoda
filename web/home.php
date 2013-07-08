<?php 
session_start();


?>
<html>
<head>
	<title>MeYoda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">	
    <link href="style/style.css" rel="stylesheet" media="screen"> 
    <link href="style/home.css" rel="stylesheet" media="screen"> 
    <style type="text/css">
      .buttonUpload{
        width: 70px;
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
      .buttonUpload:hover{
        background: #fff;
        color: rgb(219, 82, 47);
      }
    </style>
</head>
<body>
<?php if (isset($_SESSION['nombre'])){ ?>
  
<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <!-- Menu button for smallar screens -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      </a>
      <!-- Site name for smallar screens -->
      
      <a href="home.php" class="brand">MeYoda</a>

      <!-- Navigation starts -->
      <div class="nav-collapse collapse">        
        <!-- Links -->
        <ul class="nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="btn btn-inverse dropdown-toggle" href="#">
              <?php  
                  $hash = md5( strtolower( trim($_SESSION['email']) ) );
                ?>
                 <i class="icon-user icon-white"></i><strong><?php echo ucfirst($_SESSION['nombre'] )?></strong> <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu" style="width:190px;">
        			<div style="height:35px;padding:5px;">
                <img style="float:left;margin-right:10px;"class="img-circle" src="https://secure.gravatar.com/avatar/<?php echo $hash; ?>?s=35">
                <p style="padding-left:8px;float:left;margin:10px;"> <strong><?php echo ucfirst($_SESSION['nombre'] )?></strong> </p>

        			</div> 
        			<hr>           	
              <li><a href="#"><i class="icon-user"></i> Perfil</a></li>
              <li><a href="logout.php"><i class="icon-off"></i> Cerrar Sesi&oacute;n</a></li>
            </ul>
          </li>
          
        </ul>


      </div>


    </div>
  </div>

</div>
<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <div class="sidebar-inner">
        <div id="yoda_image">
      		<img style="width:100%;" src="http://images2.wikia.nocookie.net/__cb20121003000419/theclonewiki/images/2/25/Yoda_detail_cw_model.png">
      	</div>
          <!--- Sidebar navigation -->
          <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
          <ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

            <li class="nred <?php if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']== "home") ) echo 'current'; ?> sectionLi" data-section="home"><a href="?page=home"><i class="icon-home icon-white"></i> Inicio</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu  <?php if(isset($_GET['page']) && ($_GET['page']== "vendidas" || $_GET['page']== "enventa" ) ) echo 'current'; ?> nlightblue sectionLi " data-section="mimazo">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-inbox icon-white"></i> Mi Mazo 
                <!-- Icon for dropdown -->
                <span class="pull-right"><i class="icon-angle-right"></i></span>
              </a>

              <ul>
                <li class="sectionLi" data-section="vendidas"><a href="?page=vendidas">Vendidas</a></li>
                <li class="sectionLi" data-section="enventa"><a href="?page=enventa">En Venta</a></li>
              </ul>
            </li>

            <li class="ngreen sectionLi  <?php if(isset($_GET['page']) && $_GET['page']== "mispujas" ) echo 'current'; ?> " data-section="mispujas"><a href="?page=mispujas"><i class="icon-white icon-briefcase"></i> Mis Pujas</a></li>
            <li class="norange sectionLi <?php if(isset($_GET['page']) && $_GET['page']== "subircarta" ) echo 'current'; ?> " data-section="subircarta"><a href="?page=subircarta"><i class="icon-white icon-upload"></i> Subir Carta</a></li>

          </ul>

          <!-- Search form -->
          <div class="sidebar-widget">
            <form class="form-inline">
              <div class="input-append row-fluid">
                <input type="text" class="span8" placeholder="Buscar cartas">
                <button type="submit" class="btn btn-info">Buscar</button>
              </div>
            </form>
          </div>



        </div>

    </div>

    <!-- Sidebar ends -->

  	<!-- Main bar -->
  	<div class="mainbar">
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 id="sectionTitle" class="pull-left">
        <?php  
        if (!isset($_GET['page'])) {
          echo 'Inicio';
        }else if(isset($_GET['page']) && $_GET['page']== "vendidas" ){
          echo 'Vendidas';
        }else if(isset($_GET['page']) && $_GET['page']== "enventa" ){
          echo 'En Venta';
        }else if(isset($_GET['page']) && $_GET['page']== "mispujas" ){
          echo 'Mis Pujas';
        }else if(isset($_GET['page']) && $_GET['page']== "subircarta" ){
          echo 'Subir Carta';
        }else if(isset($_GET['page']) && $_GET['page']== "home" ){
          echo 'Inicio';
        }
        ?>       
        </h2>


        <!-- Breadcrumb -->
        <?php if(isset($_GET['page']) && ($_GET['page']== "vendidas" || $_GET['page']== "enventa"  ) ): ?>
          
       
        <div id="breadcrumbs" class="bread-crumb pull-right">
          <a href="#"><i class="icon-home"></i> Mi Mazo</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current" id="mazosection">
            <?php  
              if(isset($_GET['page']) && $_GET['page']== "vendidas" ){
                echo 'Vendidas';
              }else if(isset($_GET['page']) && $_GET['page']== "enventa" ){
                echo 'En Venta';
              }
            ?>
          </a>
        </div>
      <?php endif ?>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->
      <div id="matter">
      <?php  


      if (!isset($_GET['page'])) {
        include 'ventas.php';
      }else if(isset($_GET['page']) && $_GET['page'] == "vendidas"){
        if (file_exists('vendidas.php')) {
          include 'vendidas.php';   
        }else{
          ?><h4>No existe la secci&oacute;n</h4><?
        }
             
      }else if(isset($_GET['page']) && $_GET['page'] == "enventa"){         
        if (file_exists('enventa.php')) {
          include 'enventa.php';   
        }else{
          ?><h4>No existe la secci&oacute;n</h4><?
        }              
      }else if(isset($_GET['page']) && $_GET['page'] == "mispujas"){
        if (file_exists('mispujas.php')) {
          include 'mispujas.php';   
        }else{
          ?><h4>No existe la secci&oacute;n</h4><?
        }  
      }else if(isset($_GET['page']) && $_GET['page'] == "subircarta"){
        if (file_exists('subircarta.php')) {
          include 'subircarta.php';   
        }else{
          ?><h4>No existe la secci&oacute;n</h4><?
        } 
      }else if(isset($_GET['page']) && $_GET['page'] == "home"){
        if (file_exists('ventas.php')) {
          include 'ventas.php';   
        }else{
          ?><h4>No existe la secci&oacute;n</h4><?
        } 
      }else{
        if (file_exists('ventas.php')) {
          include 'ventas.php';   
        }else{
          ?><h4>No existe la secci&oacute;n</h4><?
        } 
      }


      ?>
      </div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>   
    <!--     plugin for cookies handling -->
    <script src="js/jquery.cookie.js"></script>

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



    <script type="text/javascript">

    // var currentSection = "inicio";

    // var cookieSectionPage = $.cookie('home_page') + '.php';

    // if (cookieSectionPage != "") {
      
    //   $('#matter').load(cookieSectionPage);
    //   console.log('cookie: ' + cookieSectionPage);

    // }else{

    // $('#sectionTitle').text('Inicio');
    //     $('#matter').hide();
    //     $('#matter').load('ventas.php');
    //     $('#matter').fadeIn('slow');  

    // }

    

    // console.log('Section: ' + currentSection);
    // // $('#matter').hide();
    // // $('#matter').load('ventas.php');
    // // $('#matter').fadeIn('slow');


    
    // $('li.sectionLi').click(function(){
    //   currentSection = $(this).attr('data-section');

    //    $('.sectionLi').each(function(){
    //       if ($(this).attr('data-section') == "mimazo") {
    //         $(this).removeClass('open');
    //       }
          
    //       $(this).removeClass('current');
          
          

    //    });  


              
    //   if (currentSection == 'home') {
    //     $('#sectionTitle').hide().text('Inicio').fadeIn();

    //     $(this).addClass('current');
    //     $('#breadcrumbs').fadeOut();  

    //     $('#matter').hide();
    //     $('#matter').load('ventas.php');
    //     $('#matter').fadeIn('slow'); 
        
    //     $.cookie('home_page', 'ventas', { expires: 1 });

    //     console.log('cookie: ' + $.cookie('home_page'));



    //   };

    //   if (currentSection == 'mimazo') {
    //     $(this).addClass('current');
    //     return;
    //   };

    //   if (currentSection == 'vendidas') {
    //     $('#sectionTitle').hide().text('Vendidas').fadeIn();

    //     $('#mazosection').text('Vendidas');
    //     $('#breadcrumbs').fadeIn();
    //     $('#matter').hide();
    //     $('#matter').load('vendidas.php');
    //     $('#matter').fadeIn('slow');   
  
    //     $.cookie('home_page', 'vendidas', { expires: 1 });
    //     console.log('cookie: ' + $.cookie('home_page'));



    //   };
    //   if (currentSection == 'enventa') {
    //     $('#sectionTitle').hide().text('En venta').fadeIn();

    //     $('#mazosection').text('En venta');
    //     $('#breadcrumbs').fadeIn();

    //     $('#matter').hide();
    //     $('#matter').load('enventa.php');
    //     $('#matter').fadeIn('slow');  

    //     console.log('cookie: ' + $.cookie('home_page'));
    //     console.log('cookie: ' + cookieSectionPage);



    //   };  
    //   if (currentSection == 'mispujas') {
    //     $('#sectionTitle').hide().text('Mis Pujas').fadeIn();
    //     $(this).addClass('current');  
    //     $(this).addClass('mispujas');        
    //     $('#breadcrumbs').fadeOut();

    //     $.cookie('home_page', 'mispujas', { expires: 1 });
    //     console.log('cookie: ' + $.cookie('home_page'));


    //   };   
    //   if (currentSection == 'subircarta') {
    //     $('#sectionTitle').hide().text('Subir Carta').fadeIn();
    //     $(this).addClass('current');  
    //     $(this).addClass('mispujas');        
    //     $('#breadcrumbs').fadeOut(); 

    //     $('#matter').hide();
    //     $('#matter').load('subircarta.php');
    //     $('#matter').fadeIn('slow'); 

    //     $.cookie('home_page', 'subircarta', { expires: 1 });
    //     console.log('cookie: ' + $.cookie('home_page'));

    //   };                        
    //   console.log('Section: ' + currentSection);
    // });


    </script>  
    <?php }else{ ?>
    <div class="container">
      <div class="row">
        <div class="span12">
          <h4 style="color:white;">Debes Iniciar Sesi&oacute;n.</h4>
          <a style="color:#ccc;" href="index.php">Volver</a>
        </div>
      </div>
    </div>
      
    <?php } ?>
</body>


</html>

