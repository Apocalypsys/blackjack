<?php
require_once("db_config.php");
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
if($mysqli->connect_errno)
	{
		$data["status"] = "ERROR";
		$data["message"] = "Connection problem: ".$mysqli->connect_errno." ".$mysqli->connect_error;
	}
?>