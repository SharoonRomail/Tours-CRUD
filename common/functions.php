<?php
/* <textarea>Query</textarea> */
function PrintQ($Query){
	echo "<textarea class=\"printq\">" . $Query . "</textarea>";
}
/* <textarea>Query</textarea> */

/* <PREE>PRINT_R</PREE> */
function PrintR($arr, $CssClass = null){
	if ( $CssClass == "danger" ){
		echo pres_danger;
	}else if( $CssClass == "warning" ){
		echo pres_warning;
	}else{
		echo pres;
	}
	print_r($arr);
	echo pree;
}
/* <PREE>PRINT_R</PREE> */

/* REDIRECTOR */
function RedirectTo($URL){
	echo '<script language="javascript" type="text/javascript">document.location = "' . $URL . '";</script>';
	/*echo '<script language="javascript" type="text/javascript">document.location.replace("' . $URL . '");</script>';*/
}
/* REDIRECTOR */

/* LOGIN CHECK */
function IsLogin(){
	if (isset($_SESSION['userid'])){
		// DO NOTHING
	}else{
		echo "<h2>Please Sign In to continue...</h2>";
		session_destroy();
		RedirectTo("index.php");
	}
}
/* LOGIN CHECK */

/* CHECK EXISTING USER */
function CheckUser($FldToCheck, $FldValue){
	$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
	$query = "SELECT count(*) as Total FROM tbl_users WHERE " . mysqli_escape_string($conn, $FldToCheck) . " = '" . mysqli_escape_string($conn, $FldValue) . "'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	return $row['Total'];
}
/* CHECK EXISTING USER */
?>