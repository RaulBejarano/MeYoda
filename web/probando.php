<html>
<head>
	<title>ihpsadfh</title>
</head>
<body>
<?php 

      $mysqli = new mysqli("mysql.manu.juanlu.is", "talentum", "hypernova") ;
      
      if (!$mysqli->select_db("meyodadb") ) {

        echo '[MYSQL ERROR]:' . $mysqli->error . '<br>';
        
      }else{

      	echo 'gooood';
      }

?>
</body>
</html>