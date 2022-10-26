<?php 
include_once("common/db.php");
IsLogin();
$Page_Heading = 'Tour Types';
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = true;
include_once("common/template-start.php"); ?>
<h2 class="text-center">All Tour Types</h2>
<div class="row">
	<div class="col-4 fw-bolder text-center p-3 border border-end-0 border-primary">Sr.</div>
	<div class="col-4 fw-bolder text-center p-3 border border-end-0 border-primary">Tour Type</div>
	<div class="col-4 fw-bolder text-center p-3 border border-primary">&nbsp;</div>
</div>

<div class="row">
	<?php $query = "SELECT * FROM `tbl_tour_types` ORDER BY `id` ASC";
	$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
	$result = mysqli_query($conn, $query);
	$Sr = 1;
	while ($row = mysqli_fetch_assoc($result)){ ?>
		<div class="col-4 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $Sr; ?></div>
		<div class="col-4 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['tour_type']; ?></div>
		<div class="col-4 text-center p-3 border border-top-0 border-primary">
			<div class="btn-group" role="group" aria-label="Basic example">
				<button onclick="Goto('tour_type-add.php?tour_type_id=<?php echo base64_encode($row['id']); ?>')" type="button" class="btn btn-success">Update</button>
				<button onclick="ajax_delete('<?php echo $row['id']; ?>', 'tour_type')" type="button" class="btn btn-danger">Delete</button>
			</div>
		</div>
	<?php $Sr++;
	} ?>
</div>
<?php include_once( "common/template-end.php" );?>