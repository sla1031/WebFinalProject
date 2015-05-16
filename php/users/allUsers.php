<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

ini_set('display_errors',true); 
ini_set('display_startup_errors',true); 
error_reporting (E_ALL|E_STRICT);
define('SHOW_SUCCESSFUL_TEST_OUTPUT', true);

require_once("../my-db-login-info.php");


 $conn = mysqli_connect("localhost", $dbuser, $dbpass, $db);
 echo  ($conn ? "" : "Connection NOT established.<br />\n");
$selectStmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($selectStmt, "SELECT Imp_ID, Name, Title, Department, Wage FROM ImpCmd_Employees");
if ($selectStmt){
	
	mysqli_stmt_bind_result($selectStmt, $ID, $Name, $Title, $Department, $Wage);
	mysqli_stmt_execute($selectStmt);

$outp = "";

	while (mysqli_stmt_fetch($selectStmt)) { 
		if ($outp != "") {$outp .= ",";}
    	$outp .= '{"Imp_ID":"'  . $ID . '",';
    	$outp .= '"Name":"'   . $Name        . '",';
    	$outp .= '"Title":"'. $Title     . '",'; 
 		$outp .= '"Department":"'. $Department     . '",'; 
 		$outp .= '"Wage":"'. $Wage    . '"}';

	} //select while


}//end statement if

$outp ='{"records":['.$outp.']}';

mysqli_stmt_close($selectStmt);
mysqli_close($conn);

echo($outp);
?>