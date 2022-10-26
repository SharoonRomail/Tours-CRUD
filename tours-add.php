<?php 
include_once("common/db.php");
IsLogin();
$Page_Heading = 'Tour Types';
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = true;
include_once("common/template-start.php"); 

if( isset( $_GET['tour_id']) &&  ($_GET['tour_id'] != "") ){
	$query = "SELECT * FROM tbl_tours WHERE id = '" . mysqli_escape_string($conn, base64_decode( $_GET['tour_id'] ) ) . "'";
	$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	
	$FormAction = 'post.php?page=' . base64_encode("tour_update");
	$LblButton = "Update Tour";
	$Heading = "Update tour";
	$TourId = $row['id'];
	$TourName = $row['tour_name'];
	$TourDepDate = $row['departure_date'];
	$TourCode = $row['tour_code'];
	$TourType = $row['tour_type'];
}else{
	$FormAction = 'post.php?page=' . base64_encode("tour_add");
	$LblButton = "Save Tour";
	$Heading = "Add new tour";
	$TourId = "";
	$TourName = "";
	$TourDepDate = "";
	$TourCode = "";
	$TourType = "";
} ?>
<main class="form-signin w-100 m-auto">
	<h2 class="text-center"><?php echo $Heading; ?></h2>
	<form action="<?php echo $FormAction; ?>" method="post" name="tour_add" id="tour_add">
		<div class="form-floating mb-3">
			<input type="hidden" class="form-control" id="tour_id" name="tour_id" placeholder="Tour Id" value="<?php echo $TourId; ?>">
			<input required type="text" class="form-control" id="tour_name" name="tour_name" placeholder="Tour Name" value="<?php echo $TourName; ?>">
			<label for="floatingInput">Tour Name</label>
		</div>
		<div class="form-floating mb-3">
			<input type="date" placeholder="DD MMMM, YYYY" data-date-format="DD MMMM, YYYY" onfocus="(this.type='date')" min="<?php 
			$datetime = new DateTime('tomorrow');
			echo $datetime->format('Y-m-d');?>" class="form-control" id="dep_date" name="dep_date" required value="<?php echo $TourDepDate; ?>">
			<label for="floatingPassword">Departure Date</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" required class="form-control" id="tour_code" name="tour_code" placeholder="Tour Code" value="<?php echo $TourCode; ?>">
			<label for="floatingInput">Tour Code</label>
		</div>
		<div class="form-floating mb-3">
			<select class="form-select form-select-lg mb-3" required id="tour_type" name="tour_type">
				<option>Select Tour Type</option>
				<?php
				$query = 'SELECT * FROM tbl_tour_types';
				$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
				$result = mysqli_query($conn, $query);
				$Sr = 1;
				while ($row = mysqli_fetch_assoc($result)){ 
					if ( $TourType == $row['id'] ){
						$Selected = ' selected ';
					}else{
						$Selected = '';
					}?>
					<option <?php echo $Selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row['tour_type']; ?></option>
				<?php } ?>
			</select>
			<label for="floatingInput">Tour Type</label>
		</div>
		<button class="btn btn-lg btn-success" type="submit"><?php echo $LblButton;?></button>
	</form>
</main>
<?php include_once( "common/template-end.php" );?>