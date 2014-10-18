<?php 
  ob_start(); 
 
 //htmlspecialchars($_POST['name']);
  // Define $myusername and $mypassword 
  $speed = $_POST['speed'];
  $lat = $_POST['lat'];
  $long = $_POST['long'];
  $altitude = $_POST['altitude'];
  
  $date = date('Y-m-d H:i:s'); 
  
  // Connect to the database server 
	  $dbcnx = @mysql_connect("mysql15.powweb.com","cdsuperuser", "ainfo10c");
     if (!$dbcnx) 
	 {    echo( "<PA>Unable to connect to the database server at this time.</PA>" );
	     exit();  }
    // Select the database
    if (! @mysql_select_db("chatdawg") )
	 {    echo( "<PA>Database is syncing at this time. Try again later. </PA>" );
	     exit();  }
 	   
  $sql="INSERT INTO  `Geolocate` (  `speed` ,  `lat` ,  `long`,`date`,`altitude` ) 
VALUES ('$speed' , '$lat',  '$long', '$date', '$altitude');"; 
  $result = mysql_query($sql); 
   
  // Mysql_num_row is counting table row 
  $count = mysql_num_rows($result); 
  // If result matched $myusername and $mypassword, table row must be 1 row 
  
 
  if($result) { 
     //echo "success"; 
  } else { 
       header("HTTP/1.0 500 Internal Server Error");  
  } 
   
  ob_end_flush(); 
?>