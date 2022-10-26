<?php 
include_once("common/db.php");
IsLogin();
$Page_Heading = 'Tour Types';
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = true;
include_once("common/template-start.php");

if( isset( $_GET['tour_type_id']) &&  ($_GET['tour_type_id'] != "") ){
	$query = "SELECT * FROM tbl_tour_types WHERE id = '" . mysqli_escape_string($conn, base64_decode( $_GET['tour_type_id'] ) ) . "'";
	$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	//PrintR( $row );
	
	$FormAction = 'post.php?page=' . base64_encode("tour_type_update");
	$LblButton = "Update Tour Type";
	$Heading = "Update Tour Type";
	$TourId = $row['id'];
	$TourType = $row['tour_type'];
}else{
	$FormAction = 'post.php?page=' . base64_encode("tour_type_add");
	$LblButton = "Save Tour Type";
	$Heading = "Add New Tour Type";
	$TourId = "";
	$TourType = "";
}?>
<main class="form-signin w-100 m-auto">
	<form action="<?php echo $FormAction; ?>" method="post" name="tour_add" id="tour_add">
		<h2 class="text-center"><?php echo $Heading; ?></h2>
		<div class="form-floating mb-3">
			<input type="hidden" class="form-control" id="tour_id" name="tour_id" placeholder="Tour Id" value="<?php echo $TourId; ?>">
			<input required type="text" class="form-control" id="tour_type" name="tour_type" placeholder="Tour Type" value="<?php echo $TourType; ?>">
			<label for="floatingInput">Tour Type</label>
		</div>
		<button class="btn btn-lg btn-primary" type="submit"><?php echo $LblButton;?></button>
		<button class="btn btn-lg btn-secondary" type="reset">Reset</button>
	</form>
</main>
<?php include_once( "common/template-end.php" );?>