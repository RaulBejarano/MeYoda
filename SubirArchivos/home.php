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

            <li class="ngreen"><a href="#"><i class="icon-bar-chart"></i> En venta</a></li>

            <li class="norange"><a href="#"><i class="icon-sitemap"></i> UI Elements</a></li>

            <li class="has_submenu nviolet">
              <a href="#">
                <i class="icon-file-alt"></i> Pages #1
                <span class="pull-right"><i class="icon-angle-right"></i></span>
              </a>

              <ul>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">Make Post</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Statement</a></li>
                <li><a href="#">Error Log</a></li>
                <li><a href="#">Support</a></li>
              </ul>
            </li> 

            <li class="has_submenu nblue">
              <a href="#">
                <i class="icon-file-alt"></i> Pages #2
                <span class="pull-right"><i class="icon-angle-right"></i></span>
              </a>
              
              <ul>
                <li><a href="">Error</a></li>
                <li><a href="">Gallery</a></li>
                <li><a href="">Grid</a></li>
                <li><a href="">Invoice</a></li>
                <li><a href="">Media</a></li>
                <li><a href="">Profile</a></li>
              </ul>
            </li> 

            <li class="nred"><a href="forms.html"><i class="icon-list"></i> Forms</a></li>

            <li class="nlightblue"><a href="tables.html"><i class="icon-table"></i> Tables</a></li>

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

          <!-- Today status. jQuery Sparkline plugin used. -->

          <div class="row-fluid">
            <div class="span12"> 
              <!-- List starts -->
              <ul class="today-datas">

                <!-- List #1 -->
                <li class="bred">
                  <!-- Graph -->
                  <div class="pull-left"><span id="todayspark1" class="spark"><canvas width="103" height="50" style="display: inline-block; width: 103px; height: 50px; vertical-align: top;"></canvas></span></div>
                  <!-- Text -->
                  <div class="datas-text pull-right"><span class="bold">12,000</span> Visitors/Day</div>

                  <div class="clearfix"></div>
                </li>

                <li class="bgreen">
                  <!-- Graph -->
                  <div class="pull-left"><i class="icon-group"></i></div>
                  <!-- Text -->
                  <div class="datas-text pull-right"><span class="bold">30,000</span> Members</div>

                  <div class="clearfix"></div>
                </li>

                <li class="blightblue">
                  <!-- Graph -->
                  <div class="pull-left"><span id="todayspark2" class="spark"><canvas width="103" height="50" style="display: inline-block; width: 103px; height: 50px; vertical-align: top;"></canvas></span></div>
                  <!-- Text -->
                  <div class="datas-text pull-right"><span class="bold">15.66%</span> Bounce Rate</div>

                  <div class="clearfix"></div>
                </li>

                <li class="bviolet">
                  <!-- Graph -->
                  <div class="pull-left"><span id="todayspark3" class="spark"><canvas width="170" height="50" style="display: inline-block; width: 170px; height: 50px; vertical-align: top;"></canvas></span></div>
                  <!-- Text -->
                  <div class="datas-text pull-right"><span class="bold">$22,000</span> Total Profit</div>

                  <div class="clearfix"></div>
                </li> 
 
              </ul> 
            </div>
          </div>

          <!-- Today status ends -->

          <!-- Dashboard Graph starts -->

          <div class="row-fluid">
            <div class="span8">

              <!-- Widget -->
              <div class="widget wlightblue">
                <!-- Widget head -->
                <div class="widget-head">
                  <div class="pull-left">Dashboard</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>             

                <!-- Widget content -->
                <div class="widget-content">
                  <div class="padd">

                    <!-- Bar chart (Blue color). jQuery Flot plugin used. -->
                    <div id="bar-chart" style="padding: 0px; position: relative;"><canvas class="base" width="586" height="283"></canvas><canvas class="overlay" width="586" height="283" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="tickLabels" style="font-size:smaller"><div class="xAxis x1Axis" style="color:#777"><div class="tickLabel" style="position:absolute;text-align:center;left:-19px;top:260px;width:73px">0</div><div class="tickLabel" style="position:absolute;text-align:center;left:72px;top:260px;width:73px">5</div><div class="tickLabel" style="position:absolute;text-align:center;left:164px;top:260px;width:73px">10</div><div class="tickLabel" style="position:absolute;text-align:center;left:256px;top:260px;width:73px">15</div><div class="tickLabel" style="position:absolute;text-align:center;left:347px;top:260px;width:73px">20</div><div class="tickLabel" style="position:absolute;text-align:center;left:439px;top:260px;width:73px">25</div><div class="tickLabel" style="position:absolute;text-align:center;left:531px;top:260px;width:73px">30</div></div><div class="yAxis y1Axis" style="color:#777"><div class="tickLabel" style="position:absolute;text-align:right;top:244px;right:574px;width:12px">0</div><div class="tickLabel" style="position:absolute;text-align:right;top:202px;right:574px;width:12px">10</div><div class="tickLabel" style="position:absolute;text-align:right;top:160px;right:574px;width:12px">20</div><div class="tickLabel" style="position:absolute;text-align:right;top:118px;right:574px;width:12px">30</div><div class="tickLabel" style="position:absolute;text-align:right;top:76px;right:574px;width:12px">40</div><div class="tickLabel" style="position:absolute;text-align:right;top:34px;right:574px;width:12px">50</div><div class="tickLabel" style="position:absolute;text-align:right;top:-7px;right:574px;width:12px">60</div></div></div></div>


                  </div>
                </div>
                <!-- Widget ends -->

              </div>
            </div>

            <div class="span4">

              <div class="widget wblue">

                <div class="widget-head">
                  <div class="pull-left">Today Status</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">
                      <li>
                        <span id="status1"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Visits : 2000</span> <i class="icon-arrow-up green"></i>
                      </li>
                      <li>
                        <span id="status2"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Unique Visitors : 1,345</span> <i class="icon-arrow-down red"></i>
                      </li>
                      <li>
                        <span id="status3"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Pageviews : 2000</span> <i class="icon-arrow-up green"></i>
                      </li>
                      <li>
                        <span id="status4"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Pages / Visit : 2000</span> <i class="icon-arrow-down red"></i>
                      </li>
                      <li>
                        <span id="status5"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Avg. Visit Duration : 2000</span> <i class="icon-arrow-down red"></i>
                      </li>
                      <li>
                        <span id="status6"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">Bounce Rate : 2000</span> <i class="icon-arrow-up green"></i>
                      </li>   
                      <li>
                        <span id="status7"><canvas width="80" height="20" style="display: inline-block; width: 80px; height: 20px; vertical-align: top;"></canvas></span> <span class="bold">% New Visits : 2000</span> <i class="icon-arrow-up green"></i>
                      </li>                                                                                                            
                    </ul>

                  </div>
                </div>

              </div>

            </div>
          </div>
          <!-- Dashboard graph ends -->

          <!-- Chats, File upload and Recent Comments -->
          <div class="row-fluid">

            <div class="span4">
              
              <!-- Chat Widget -->
              <div class="widget wgreen">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Chats</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <!-- Widget content -->
                  <div class="padd">
                    
                    <ul class="chats">

                      <!-- Chat by us. Use the class "by-me". -->
                      <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="img/user.jpg" alt="">
                        </div>

                        <div class="chat-content">
                          <!-- In meta area, first include "name" and then "time" -->
                          <div class="chat-meta">Ashok <span class="pull-right">3 hours ago</span></div>
                          Vivamus diam elit diam, consectetur dapibus adipiscing elit.
                          <div class="clearfix"></div>
                        </div>
                      </li> 

                      <!-- Chat by other. Use the class "by-other". -->
                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="img/user.jpg" alt="">
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta">3 hours ago <span class="pull-right">Ravi</span></div>
                          Vivamus diam elit diam, consectetur fconsectetur dapibus adipiscing elit.
                          <div class="clearfix"></div>
                        </div>
                      </li>   

                      <li class="by-me">
                        <div class="avatar pull-left">
                          <img src="img/user.jpg" alt="">
                        </div>

                        <div class="chat-content">
                          <div class="chat-meta">Ashok <span class="pull-right">4 hours ago</span></div>
                          Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                          <div class="clearfix"></div>
                        </div>
                      </li>  

                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="img/user.jpg" alt="">
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta">3 hours ago <span class="pull-right">Ravi</span></div>
                          Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                          <div class="clearfix"></div>
                        </div>
                      </li>                                                                                  

                    </ul>

                  </div>
                </div>


                  <!-- Widget footer -->
                  <div class="widget-foot">
                      
                    <!-- Chat input box -->
                      <form class="form-inline">
                        <div class="input-append row-fluid">
                          <input type="text" class="span9" placeholder="Type your message">
                          <button type="submit" class="btn btn-info">Send</button>
                        </div>
                      </form>

                  </div>

              </div>

            </div>


            <!-- File Upload widget -->
            <div class="span4">

              <div class="widget wviolet">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">File Upload</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <!-- Widget content -->
                  <!-- File upload list starts -->
                  <ul class="file-upload">

                    <li>
                      <!-- Icon with file name -->
                      <strong><i class="icon-upload-alt green"></i> File_Name_Here.Mp3</strong>
                      <!-- Progress bar -->
                      <div class="progress progress-animated progress-striped">
                        <div class="bar bar-success" data-percentage="100" style="width: 100%;">100%</div>
                      </div>
                      <!-- Upload details -->
                      <div class="file-meta">3.3 of 5MB - 5 mins - 1MB/Sec</div>
                      <!-- Buttons -->
                      <div class="btn-grou1p">
                        <button class="btn btn-mini btn-success"><i class="icon-play"></i> </button>
                        <button class="btn btn-mini btn-primary"><i class="icon-pause"></i> </button>
                        <button class="btn btn-mini btn-danger pull-right"><i class="icon-remove"></i> </button>
                      </div>
                    </li>

                    <li>
                      <strong><i class="icon-ok red"></i> Second_File.Mp3</strong>
                      <div class="file-meta">5MB - 5 mins - Completed</div>
                    </li>

                    <li>
                      <strong><i class="icon-ok red"></i> Third_File_Here.Mp3</strong>
                      <div class="file-meta">5MB - 5 mins - Stopped</div>
                    </li>
                                                           
                  </ul>

                </div>

                <div class="widget-foot">
                  <button class="btn pull-right">Clear All</button>
                  <div class="clearfix"></div>
                </div>

              </div>

              <div class="widget worange">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Browsers</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content referrer">
                  <!-- Widget content -->
                  
                  <table class="table  table-bordered ">
                    <tbody><tr>
                      <th><center>#</center></th>
                      <th>Browsers</th>
                      <th>Visits</th>
                    </tr>
                    <tr>
                      <td><img src="img/icons/chrome.png" alt="">
                      </td><td>Google Chrome</td>
                      <td>3,005</td>
                    </tr> 
                    <tr>
                      <td><img src="img/icons/firefox.png" alt="">
                      </td><td>Mozilla Firefox</td>
                      <td>2,505</td>
                    </tr> 
                    <tr>
                      <td><img src="img/icons/ie.png" alt="">
                      </td><td>Internet Explorer</td>
                      <td>1,405</td>
                    </tr> 
                    <tr>
                      <td><img src="img/icons/opera.png" alt="">
                      </td><td>Opera</td>
                      <td>4,005</td>
                    </tr> 
                    <tr>
                      <td><img src="img/icons/safari.png" alt="">
                      </td><td>Safari</td>
                      <td>505</td>
                    </tr>                                                                    
                  </tbody></table>

                </div>
                  <div class="widget-foot">
                  </div>
              </div>

            </div>


            <!-- Project widget -->
            <div class="span4">
              <div class="widget wred">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Project</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <!-- Widget content -->
                  <!-- Task list starts -->
                  <ul class="project">

                    <li>
                      <p>
                        <!-- Checkbox -->
                        <input value="check1" type="checkbox"> 
                        <!-- Name -->
                        Hospital Management System
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Due : 26/2/2012 - 80% Done</span> 
                      </p>

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-danger" style="width: 80%;"></div>
                      </div>
                    </li>


                    <li>
                      <p>
                        <!-- Checkbox -->
                        <input value="check1" type="checkbox">
                        <!-- Name -->
                        School Download System
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Due : 26/2/2012 - 80% Done</span> 
                      </p>

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-success" style="width: 50%;"></div>
                      </div>
                    </li>

                    <li>
                      <p>
                        <!-- Checkbox -->
                        <input value="check1" type="checkbox"> 
                        <!-- Name -->
                        Question and Answers Script
                      </p>

                      <p class="p-meta">
                        <!-- Due date & % Completed -->
                        <span>Due : 26/2/2012 - 80% Done</span> 
                      </p>

                      <div class="progress progress-striped">
                        <!-- Progress bar -->
                        <div class="bar bar-success" style="width: 40%;"></div>
                      </div>
                    </li>                                                              

                  </ul>
                  <div class="clearfix"></div>  


                </div>
                <div class="widget-foot">

                </div>
              </div>
            </div>


            <!-- Server Status -->
            <div class="span4">
              <div class="widget wlightblue">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Server Status</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <!-- Widget content -->
                  
                  <table class="table  table-bordered ">
                    <tbody><tr>
                      <td>Domain</td>
                      <td>sitedomain.com</td>
                    </tr> 
                    <tr>
                      <td>IP Address</td>
                      <td>192.425.2.4</td>
                    </tr> 
                    <tr>
                      <td>Disk Space</td>
                      <td>600GB / 60000GB</td>
                    </tr> 
                    <tr>
                      <td>Bandwidth</td>
                      <td>1000GB / 2000GB</td>
                    </tr> 
                    <tr>
                      <td>PHP Version</td>
                      <td>5.1.1</td>
                    </tr> 
                    <tr>
                      <td>MySQL Databases</td>
                      <td>10</td>
                    </tr>                                                                                                     
                  </tbody></table>

                </div>
              </div>
            </div>


          </div>


          <div class="row-fluid">
            <div class="span6">
              <div class="widget wblue">
                <div class="widget-head">
                  <div class="pull-left">Curve Chart</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    
                    <!-- Curve chart -->

                    <div id="curve-chart" style="padding: 0px; position: relative;"><canvas class="base" width="425" height="250"></canvas><canvas class="overlay" width="425" height="250" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="tickLabels" style="font-size:smaller"><div class="xAxis x1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:center;left:-2px;top:227px;width:53px">0</div><div class="tickLabel" style="position:absolute;text-align:center;left:56px;top:227px;width:53px">2</div><div class="tickLabel" style="position:absolute;text-align:center;left:115px;top:227px;width:53px">4</div><div class="tickLabel" style="position:absolute;text-align:center;left:174px;top:227px;width:53px">6</div><div class="tickLabel" style="position:absolute;text-align:center;left:233px;top:227px;width:53px">8</div><div class="tickLabel" style="position:absolute;text-align:center;left:292px;top:227px;width:53px">10</div><div class="tickLabel" style="position:absolute;text-align:center;left:350px;top:227px;width:53px">12</div></div><div class="yAxis y1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:right;top:192px;right:406px;width:19px">-1.0</div><div class="tickLabel" style="position:absolute;text-align:right;top:147px;right:406px;width:19px">-0.5</div><div class="tickLabel" style="position:absolute;text-align:right;top:102px;right:406px;width:19px">0.0</div><div class="tickLabel" style="position:absolute;text-align:right;top:56px;right:406px;width:19px">0.5</div><div class="tickLabel" style="position:absolute;text-align:right;top:11px;right:406px;width:19px">1.0</div></div></div><div class="legend"><div style="position: absolute; width: 51px; height: 50px; top: 9px; right: 9px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(250,48,49);overflow:hidden"></div></div></td><td class="legendLabel">sin(x)</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(67,200,60);overflow:hidden"></div></div></td><td class="legendLabel">cos(x)</td></tr></tbody></table></div></div>

                    <hr>
                    <!-- Hover location -->
                    <div id="hoverdata">Mouse hovers at
                    (<span id="x">0</span>, <span id="y">0</span>). <span id="clickdata"></span></div>          

                    <!-- Skil this line. <div class="uni"><input id="enableTooltip" type="checkbox">Enable tooltip</div> -->

                  </div>
                </div>
                <div class="widget-foot">
                    <!-- Footer goes here -->
                </div>
              </div> 
            </div>
            <div class="span6">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Quick Post</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                
                <div class="widget-content">
                  <div class="padd">
                    
                      <div class="form quick-post">
                                      <!-- Edit profile form (not working)-->
                                      <form class="form-horizontal">
                                          <!-- Title -->
                                          <div class="control-group">
                                            <label class="control-label" for="title">Title</label>
                                            <div class="controls">
                                              <input type="text" class="input-large" id="title">
                                            </div>
                                          </div>   
                                          <!-- Content -->
                                          <div class="control-group">
                                            <label class="control-label" for="content">Content</label>
                                            <div class="controls">
                                              <textarea class="input-large" id="content"></textarea>
                                            </div>
                                          </div>                           
                                          <!-- Cateogry -->
                                          <div class="control-group">
                                            <label class="control-label">Category</label>
                                            <div class="controls">                               
                                                <select>
                                                  <option value="">- Choose Cateogry -</option>
                                                  <option value="1">General</option>
                                                  <option value="2">News</option>
                                                  <option value="3">Media</option>
                                                  <option value="4">Funny</option>
                                                </select>  
                                            </div>
                                          </div>              
                                          <!-- Tags -->
                                          <div class="control-group">
                                            <label class="control-label" for="tags">Tags</label>
                                            <div class="controls">
                                              <input type="text" class="input-large" id="tags">
                                            </div>
                                          </div>
                                          
                                          <!-- Buttons -->
                                          <div class="form-actions">
                                             <!-- Buttons -->
                                            <button type="submit" class="btn btn-info">Publish</button>
                                            <button type="submit" class="btn">Save Draft</button>
                                            <button type="reset" class="btn">Reset</button>
                                          </div>
                                      </form>
                                    </div>
                  

                  </div>
                </div>

                <div class="widget-foot">
                    <!-- Footer goes here -->
                </div>

              </div> 
            </div>            
          </div>  


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

