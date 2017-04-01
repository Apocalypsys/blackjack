<?php
require_once("database.php");

if(isset($_REQUEST["type"]) && !empty($_REQUEST["type"]) && isset($_REQUEST["table"]) && !empty($_REQUEST["table"]))
	{
		$type = $_REQUEST["type"];
		$table = $_REQUEST["table"];
		switch($type)
			{
				case "getRows":
					$query = "SELECT * FROM `$table`";
					if($result = $mysqli->query($query))
						{
							$i = 0;
							
							while($row = $result->fetch_assoc())
								{
									$rows[$i] = $row;
									$i++;
								}
							$data["status"] = "SUCCESS";
							$data["rows"] = $rows;
							$result->free();
						}
					$mysqli->close();
					break;
				case "getLists":
					$query = "SELECT `username`,`email` FROM `$table`";
					if($result = $mysqli->query($query))
						{
							$i = 0;
							$data["test"] = $result;
							while($row = $result->fetch_assoc())
								{
									$rows[$i] = $row;
									$i++;
								}
							$data["status"] = "SUCCESS";
							$data["rows"] = $rows;
							$result->free();
						}
					$mysqli->close();
					break;
				case "addUser":
					$json = json_decode($_REQUEST["data"],true);
					$username = $json["username"];
					$email = $json["email"];
					$password = sha1($json["password"]);
					$query = "INSERT INTO `$table`(`username`,`email`,`password`,`created`) VALUES('$username','$email','$password',NOW())";
					if(!$mysqli->query($query))
						{
							$data["status"] = "ERROR";
							$data["message"] = "OOPS!".$mysqli->errno." ".$mysqli->error;
						}
					else
						{
							$data["status"] = "SUCCESS";
							$data["message"] = "User was added!";
						}
					break;
			}
	}
else
	{
		$data = array();
	}
//INSERT INTO `members`(`username`, `email`, `password`, `registration_date`) VALUES('admin','admin@email.com','admin',NOW())
echo json_encode($data);
?>