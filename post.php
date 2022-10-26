<?php 
include_once("common/db.php");
IsLogin();
$Page_Heading = 'Post';
$page = base64_decode($_GET['page']);

$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = true;
include_once("common/template-start.php");
//PrintR( $_POST );

switch ($page) {

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "tour_add":
		$query = "INSERT INTO `tbl_tours` (`tour_name`, `departure_date`, `tour_code`, `tour_type`) VALUES ( '" . mysqli_escape_string($conn, $_POST['tour_name']) . "', '" . mysqli_escape_string($conn, $_POST['dep_date']) . "', '" . mysqli_escape_string($conn, $_POST['tour_code']) . "', '" . mysqli_escape_string($conn, $_POST['tour_type']) . "')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result){
			RedirectTo('tours.php');
		}
	break;
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "tour_update":
		$query = "UPDATE `tbl_tours` SET `tour_name` = '" . mysqli_escape_string($conn, $_POST['tour_name']) . "', `departure_date` = '" . mysqli_escape_string($conn, $_POST['dep_date']) . "', `tour_code` = '" . mysqli_escape_string($conn, $_POST['tour_code']) . "', `tour_type` = '" . mysqli_escape_string($conn, $_POST['tour_type']) . "' WHERE  `id`= '" . mysqli_escape_string($conn, $_POST['tour_id']) . "'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result){
			unset($_SESSION['tour_id']);
			RedirectTo('tours.php');
		}
	break;
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "tour_type_add":
		$query = "INSERT INTO `tbl_tour_types` (`tour_type`) VALUES ('" . mysqli_escape_string($conn, $_POST['tour_type']) ."')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result){
			RedirectTo('tour_type.php');
		}
	break;
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "tour_type_update":
		$query = "UPDATE `tbl_tour_types` SET `tour_type` = '" . mysqli_escape_string($conn, $_POST['tour_type']) . "' WHERE  `id`= '" . mysqli_escape_string($conn, $_POST['tour_id']) . "'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result){
			RedirectTo('tour_type.php');
		}
	break;
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "user_add":
		$UsernameCheck = CheckUser("username", mysqli_escape_string($conn, $_POST['username']) );
		$EmailCheck = CheckUser("email", mysqli_escape_string($conn, $_POST['email']) );
		
		if ( $UsernameCheck == "1" && $EmailCheck == "1" ){
			$_SESSION['user_add_error'] = "<strong>Username & Email</strong> already associated with a user!";
		}elseif ( $UsernameCheck == "1" ){
			$_SESSION['user_add_error'] = "<strong>Username</strong> already associated with a user!";			
		}elseif ( $EmailCheck == "1" ){
			$_SESSION['user_add_error'] = "<strong>Email</strong> already associated with a user!";			
		}else{
			$_SESSION['user_add_error'] = "";
			$_SESSION['PostData'] = "";
		}
		//echo $UsernameCheck . "<br />" . $EmailCheck . "<br />";
		if ( $_SESSION['user_add_error'] == "" ){
			unset($_SESSION['user_add_error']);
			unset($_SESSION['PostData']);	
			$query = "INSERT INTO `tbl_users` (`username`, `password`, `email`, `name`, `status`) VALUES ('" . mysqli_escape_string($conn, $_POST['username']) . "', '" . mysqli_escape_string($conn, md5($_POST['password']) ) . "', '" . mysqli_escape_string($conn, $_POST['email']) . "', '" . mysqli_escape_string($conn, $_POST['name']) . "', '" . mysqli_escape_string($conn, $_POST['status']) . "')";
			//PrintQ( $query );
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			if ($result){
				RedirectTo('users.php');
			}
		}else{
			$PostData =  $_POST['username'] . "|" . $_POST['password'] . "|" . $_POST['email'] . "|" . $_POST['name'] . "|" . $_POST['status'];
			$_SESSION['PostData'] = $PostData;
			RedirectTo('users-add.php');
		}
		
		
	break;
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "user_update":
		$query = "UPDATE `tbl_users` SET `username` = '" . mysqli_escape_string($conn, $_POST['username']) . "', `password` = '" . mysqli_escape_string($conn, $_POST['password']) . "', `email` = '" . mysqli_escape_string($conn, $_POST['email']) . "', `name` = '" . mysqli_escape_string($conn, $_POST['name']) . "', `status` = '" . mysqli_escape_string($conn, $_POST['status']) . "' WHERE  `id` = '" . mysqli_escape_string($conn, $_POST['user_id']) . "'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result){
			RedirectTo('users.php');
		}
	break;
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
}

include_once( "common/template-end.php" );?>