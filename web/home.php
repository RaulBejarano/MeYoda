<html>
<head>
	<title>MeYoda</title>
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
	}	
    </style>



</head>

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
      
      <a href="index.php" class="brand">MeYoda</a>

      <!-- Navigation starts -->
      <div class="nav-collapse collapse">        



        <!-- Links -->
        <ul class="nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <img width="25" height="25" src="http://images2.wikia.nocookie.net/__cb20091112143747/starwars/images/9/9d/Yoda_CN.jpg" alt="" class="nav-user-pic"> Admin <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu" style="width:190px;">
			<div style="height:80px;">
      			<img style="float:left;top:0;margin:5px;" width="50" src="https://secure.gravatar.com/avatar/11ba6741c5abf45b09099206eb20066d?s=167&amp;d=http%3A%2F%2Fstatic.betabeers.com%2Fimg%2Favatar.png">
				<p style="padding-left:8px;"> <strong> Nombre Prueba</strong></p>
			</div> 
			<hr>           	
              <li><a href="#"><i class="icon-user"></i> Profile</a></li>
              <li><a href="#"><i class="icon-cogs"></i> Settings</a></li>
              <li><a href="login.html"><i class="icon-off"></i> Logout</a></li>
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

            <li class="nred current"><a href="#"><i class="icon-home icon-white"></i> Inicio</a></li>

            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-inbox icon-white"></i> Mi Mazo 
                <!-- Icon for dropdown -->
                <span class="pull-right"><i class="icon-angle-right"></i></span>
              </a>
	
            </li>

            <li class="ngreen"><a id="div-btn1" style="cursor:pointer;"><i class="icon-bar-chart"></i> En venta</a></li>  

            <li class="norange"><a href="#"><i class="icon-sitemap"></i>Mis Pujas</a></li>


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
	      <h2 class="pull-left">Dashboard 
          <!-- page meta -->
          <span class="page-meta">Something Goes Here</span>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="icon-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Dashboard</a>
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container-fluid">

          <!-- DIV CENTRAL !!-->
          <div id="div-results"></div>


        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

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

