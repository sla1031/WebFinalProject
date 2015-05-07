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
$id = $data['id'];
$subject = $data['subject'];
$text = $data['text'];



$conn = mysqli_connect("localhost", $dbuser, $dbpass, $dbuser);
echo  ($conn ? "" : "Connection NOT established.<br />\n");

$updateStmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($updateStmt, "UPDATE ImpCmd_Memos SET Subject=?, MemoText=?  WHERE ID=?");
if ($updateStmt){
	mysqli_stmt_bind_param($updateStmt, 'ssi', $subject, $text, $id);
	mysqli_stmt_execute($updateStmt);

}	

mysqli_stmt_close($updateStmt);
mysqli_close($conn);



?>