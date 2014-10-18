<?php
try{
		$db1 = new PDO('mysql:host=mysql15.powweb.com;dbname=txtblocker','supertxtadmn','myriad777!');
		$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		die();
	}
	
	$useridE = $_GET['userid']; 
	$passwordE = $_GET['passid'];
	
    
	$date = date('Y-m-d H:i:s'); 
	
	$sql = "SELECT * FROM people WHERE username = :userid and password = :password ";
    $q = $db1->prepare($sql);
    $q->execute(array(':userid'=>$useridE,':password'=>$passwordE));
    $result= $q->fetch();
	
	//if (!$result){
	  
	 	// query
		$sql = "INSERT INTO people (username,password,date) VALUES (:userid,:password,:date)";
		$q = $db1->prepare($sql);
		$result = $q->execute(array(':userid'=>$useridE,':password'=>$passwordE,':date'=>$date));
		
		header('Content-Type: application/json');
		if ($result === true) {
			header('Cache-Control: no-cache, must-revalidate');
	    	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	    	$array = array();
			$array['success'] = TRUE;
			$array['userid'] = $userid;
			echo json_encode($array);
	    	
		}
		else {
			echo json_encode(array('status' => 'error','message'=> 'Insert failed'));
		}
	//}
	
	