<?php
	$db = new mysqli('localhost','root','','procurement'); 
	extract($_POST);
	$id = $db->real_escape_string($id);
	$status = $db->real_escape_string($status);
	$run = $db->query("UPDATE users SET status='$status' WHERE id='$id'");
	echo 1;
?>