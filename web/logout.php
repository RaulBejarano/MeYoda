<?php 
	session_start();
	session_unset();
	session_destroy();
	echo '<meta http-equiv="refresh" content="0;url=http://manu.juanlu.is/meyoda/index.php" >';
 ?>