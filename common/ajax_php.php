<?php
//ini_set('session.save_path', '../tmp');
include_once('db.php');
$user_id = $_SESSION['userid'];

switch ($_REQUEST['todo']) {
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "TourUpdate":
		$record_id = $_REQUEST['record_id'];
		$_SESSION['tour_id'] = $record_id;
		echo $record_id;
	break;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "AJAX_Delete":
		$id = $_REQUEST['id'];
		$field = $_REQUEST['field'];
		
		if ($field == 'tour'){
			$query = "DELETE FROM `tbl_tours` WHERE `id` = '" . mysqli_escape_string($conn, $id) . "'";
		}
		if ($field == 'tour_type'){
			$query = "DELETE FROM `tbl_tour_types` WHERE `id` = '" . mysqli_escape_string($conn, $id) . "'";
		}
		if ($field == 'users'){
			$query = "DELETE FROM `tbl_users` WHERE `id` = '" . mysqli_escape_string($conn, $id) . "'";
		}
		
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result){
			echo $field;
		}
	break;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
exit;
?>