<?php 
session_start();
$errors = array();
$errors = array();
$registerErrors = array();
?>
<html>
<head>
	<title>MeYoda Cards</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">    
    <link href="css/bootstrap-responsive.css" rel="stylesheet" > 
    <link rel="shortcut icon" href="img/logos/logo_thumbnail.png">

    <link href="css/index.css" rel="stylesheet" >     


</head>

<body>
  <div id="falconLogo">
    <img style="margin-top:5px;" src="img/meyodacards.png">
  </div>
  <div class="row container">
<!--     <div class="span6 visible-desktop hide" id="yodaImage" style="overflow:hidden;"></div>
 -->    
    <div class="span12" id="rightBar" style="text-align:left;">
      <div style="width:100%;">
        <div id="logRegDiv" style="width:100%;">
          <!-- Contenido dinámico -->
        </div>
         <div class="span4">
          <?php include 'logandreg.php'; ?>
         </div>
      </div>
      
    </div>
  </div>
  
  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/meyoda.js"></script> 
  <script type="text/javascript">
  $('.carousel').carousel();
    $('.modal').modal();

    var pss1 = $('#pss').val();
    var pss2 = $('#pss2').val();

    function checkPasswords(){
      var pss1 = $('#pss').val();
      var pss2 = $('#pss2').val();
      if (pss1 == pss2) {
        $('#checkPasswords').removeClass('badge-important').addClass('badge-success');
        $('#checkPasswords').html('<i class="icon-ok icon-white"></i>');

      };
    }
    $('#pss').change(function(){
      checkPasswords();
    });
    $('#pss2').change(function(){
      checkPasswords();
    });    


    $('#logRegDiv').load('login.php');

    if ($('#registerNotificaciones').is(':visible')) {
      $('#logRegDiv').load('register.php');

    };

  </script>
</body>


</html>

