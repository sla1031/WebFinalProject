<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

ini_set('display_errors',true); 
ini_set('display_startup_errors',true); 
error_reporting (E_ALL|E_STRICT);
define('SHOW_SUCCESSFUL_TEST_OUTPUT', true);

require_once("../my-db-login-info.php");
//saveUser.php?&name=Thomas Roark&title=Stormtrooper&department=Military&wage=7.18
$parts = parse_url($_SERVER["REQUEST_URI"]);
parse_str($parts['query'], $data);
$subject = $data['subject'];
$text = $data['text'];





mysqli_stmt_prepare($insertStmt, "INSERT INTO ImpCmd_Memos (Subject, MemoText) VALUES (?,?)");
if ($insertStmt){
	mysqli_stmt_bind_param($insertStmt, 'ss', $subject, $text);
	mysqli_stmt_execute($insertStmt);

}	

mysqli_stmt_close($insertStmt);
mysqli_close($conn);


?>