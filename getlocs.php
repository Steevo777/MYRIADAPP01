<?php 
  
 
 try{
		$db1 = new PDO('mysql:host=mysql15.powweb.com;dbname=chatdawg','cdsuperuser','ainfo10c');
		$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		die();
	}	
 
 
  $userid = $_POST['userid'];
  $date = date('Y-m-d H:i:s');
  $parts = parse_url($url);

$parts = parse_url($url);
parse_str($parts['query'], $query);
echo $query['userid'];

  Echo $userid;
  
  echo $userid;
  
  //$userid = "Steve"; 
  
    $sql = "SELECT * FROM Geolocate WHERE userid = :userid and  k1 mod 200 = 0 ORDER BY date DESC limit 1000";
    $q = $db1->prepare($sql);
    $q->execute(array(':userid'=>$userid));
    $result=$q->fetchAll(PDO::FETCH_ASSOC);
    
    //$result= $q->fetch();
	
    if (!$result) {echo("<P>Error performing projects query: ".mysql_error()."</P>");
	      exit();}
 		
	if ($result) {
		//$results=$statement->fetchAll(PDO::FETCH_ASSOC);
		
		$json=json_encode($result);
		echo $json;
		
	}
	else { 
	    header("HTTP/1.0 500 Internal Server Error"); 
	} 
   
  
?>