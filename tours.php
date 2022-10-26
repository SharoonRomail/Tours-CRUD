<?php 
include_once("common/db.php");
IsLogin();
$Page_Heading = "Tours";
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = true;
include_once("common/template-start.php"); ?>
<h2 class="text-center">All Tours</h2>
<div class="row">
	<div class="col-1 fw-bolder text-center p-3 border border-end-0 border-primary">Sr.</div>
	<div class="col-2 fw-bolder text-center p-3 border border-end-0 border-primary">Name</div>
	<div class="col-2 fw-bolder text-center p-3 border border-end-0 border-primary">Depature Date</div>
	<div class="col-2 fw-bolder text-center p-3 border border-end-0 border-primary">Tour Code</div>
	<div class="col-2 fw-bolder text-center p-3 border border-end-0 border-primary">Tour Type</div>
	<div class="col-3 fw-bolder text-center p-3 border border-primary">&nbsp;</div>
</div>

<div class="row">
	<?php $query = "SELECT tbl_tours.id, tbl_tours.tour_name, tbl_tours.departure_date, tbl_tours.tour_code, tbl_tour_types.tour_type FROM `tbl_tours` LEFT JOIN `tbl_tour_types` ON tbl_tours.tour_type = tbl_tour_types.id ORDER BY tbl_tours.id ASC";
	//$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
	$result = mysqli_query($conn, $query);
	$Sr = 1;
	while ($row = mysqli_fetch_assoc($result)){ 
		//PrintR( $row ); ?>
		<div class="col-1 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $Sr; ?></div>
		<div class="col-2 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['tour_name']; ?></div>
		<div class="col-2 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['departure_date']; ?></div>
		<div class="col-2 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['tour_code']; ?></div>
		<div class="col-2 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['tour_type']; ?></div>
		<div class="col-3 text-center p-3 border border-top-0 border-primary">
			<div class="btn-group" role="group" aria-label="Basic example">
				<button onclick="Goto('tours-add.php?tour_id=<?php echo base64_encode($row['id']); ?>')" type="button" class="btn btn-success">Update</button>
				<button onclick="ajax_delete('<?php echo $row['id']; ?>', 'tour')" type="button" class="btn btn-danger">Delete</button>
			</div>
		</div>
	<?php $Sr++;
	} ?>
</div>
<?php include_once( "common/template-end.php" );?>