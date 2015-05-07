<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

ini_set('display_errors',true); 
ini_set('display_startup_errors',true); 
error_reporting (E_ALL|E_STRICT);
define('SHOW_SUCCESSFUL_TEST_OUTPUT', true);

require_once("../my-db-login-info.php");
//getUser?user=1
$parts = parse_url($_SERVER["REQUEST_URI"]);
parse_str($parts['query'], $data);

$memo = $data['memo'];


 $conn = mysqli_connect("localhost", $dbuser, $dbpass, $dbuser);
 echo  ($conn ? "" : "Connection NOT established.<br />\n");
$selectStmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($selectStmt, "SELECT ID, User, DatePublished, Subject, MemoText FROM ImpCmd_Memos where ID=?");
if ($selectStmt){
	mysqli_stmt_bind_param($selectStmt, 'i', $memo);
	mysqli_stmt_bind_result($selectStmt, $ID, $User, $DatePublished, $Subject, $Text);
	mysqli_stmt_execute($selectStmt);

$outp = "";

	while (mysqli_stmt_fetch($selectStmt)) { 
		if ($outp != "") {$outp .= ",";}
    	$outp .= '{"id":"'  . $ID . '",';
    	$outp .= '"user":"'   . $User        . '",';
    	$outp .= '"datePublished":"'   . $DatePublished        . '",';
    	$outp .= '"subject":"'. $Subject     . '",'; 
 		$outp .= '"text":"'. $Text    . '"}';

	} //select while


}//end statement if

$outp ='{"records":['.$outp.']}';

mysqli_stmt_close($selectStmt);
mysqli_close($conn);

echo($outp);
?>