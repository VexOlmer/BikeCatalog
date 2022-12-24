<?php

include("app/database/db.php");

if(isset($_POST["action"])){
	$html = searchProducts($_POST);
	$data = array(
		"html"	=> $html,
	);
	echo json_encode($data);	
}

?>