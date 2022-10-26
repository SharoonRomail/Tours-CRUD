<?php 
include_once("common/db.php");
IsLogin();
$Page_Heading = "Users";
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = true;
include_once("common/template-start.php"); ?>
<h2 class="text-center">All Users</h2>
<div class="row">
	<div class="col-1 fw-bolder text-center p-3 border border-end-0 border-primary">Sr.</div>
	<div class="col-3 fw-bolder text-center p-3 border border-end-0 border-primary">Username</div>
	<?php /* <div class="col-2 fw-bolder text-center p-3 border border-end-0 border-primary">Password</div> */ ?>
	<div class="col-3 fw-bolder text-center p-3 border border-end-0 border-primary">Email</div>
	<div class="col-2 fw-bolder text-center p-3 border border-end-0 border-primary">Status</div>
	<div class="col-3 fw-bolder text-center p-3 border border-primary">&nbsp;</div>
</div>

<div class="row">
	<?php $query = "SELECT * FROM `tbl_users` ORDER BY id ASC";
	//$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
	$result = mysqli_query($conn, $query);
	$Sr = 1;
	while ($row = mysqli_fetch_assoc($result)){ 
		//PrintR( $row ); ?>
		<div class="col-1 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $Sr; ?></div>
		<div class="col-3 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['username']; ?></div>
		<?php /* <div class="col-2 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['password']; ?></div> */ ?>
		<div class="col-3 text-center p-3 border border-top-0 border-end-0 border-primary"><?php echo $row['email']; ?></div>
		<div class="col-2 text-center p-3 border border-top-0 border-end-0 border-primary"><?php 
		if ($row['status'] == 1){ 
			echo '<img src="images/published.png" />';
		}else{ 
			echo '<img src="images/unpublished.png" />';
		} ?></div>
		<div class="col-3 text-center p-3 border border-top-0 border-primary">
			<div class="btn-group" role="group" aria-label="Basic example">
				<button onclick="Goto('users-add.php?user_id=<?php echo base64_encode($row['id']); ?>')" type="button" class="btn btn-success">Update</button>
				<button onclick="ajax_delete('<?php echo $row['id']; ?>', 'users')" type="button" class="btn btn-danger">Delete</button>
			</div>
		</div>
	<?php $Sr++;
	} ?>
</div>
<?php include_once( "common/template-end.php" );?>