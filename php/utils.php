<?php
require_once("my-db-login-info.php");

function openConnection(){
	$conn = mysqli_connect("localhost", $dbuser, $dbpass, $db);
	echo  ($conn ? "" : "Connection NOT established.<br />\n");

	$sqlStmt = mysqli_stmt_init($conn);
	
	
}

?>