<?php
	$DB = new mysqli('localhost','root','','procurement-db'); 
	extract($_POST);
	$id = $DB->real_escape_string($id);
	$status = $DB->real_escape_string($status);
	$run = $DB->query("UPDATE users SET status='$status' WHERE id='$id'");
	echo 1;
?>