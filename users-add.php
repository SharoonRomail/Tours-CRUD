<?php 
include_once("common/db.php");
IsLogin();
$Page_Heading = 'Tour Types';
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = true;
include_once("common/template-start.php");

if( isset( $_GET['user_id']) &&  ($_GET['user_id'] != "") ){
	$query = "SELECT * FROM tbl_users WHERE id = '" . mysqli_escape_string($conn, base64_decode( $_GET['user_id'] )) . "'";
	$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	//PrintR( $row );
	$FormAction = 'post.php?page=' . base64_encode("user_update");
	$LblButton = "Update User";
	$Heading = "Update user";
	
	$UserId = $row['id'];
	$Username = $row['username'];
	$Password = $row['password'];
	$Email = $row['email'];
	$Name = $row['name'];
	$UserStatus = $row['status'];

}else{
	if ( (isset($_SESSION['user_add_error'])) && ($_SESSION['user_add_error'] != "")) {
		
		$PostData = explode("|", $_SESSION['PostData']);
		//PrintR($PostData);
		
		$FormAction = 'post.php?page=' . base64_encode("user_add");
		$LblButton = "Save user";
		$Heading = "Add new user";

		$UserId = "";
		$Username = $PostData[0];
		$Password = $PostData[1];
		$Email = $PostData[2];
		$Name = $PostData[3];
		$UserStatus = $PostData[4];
	}else{
		$FormAction = 'post.php?page=' . base64_encode("user_add");
		$LblButton = "Save user";
		$Heading = "Add new user";

		$UserId = "";
		$Username = "";
		$Password = "";
		$Email = "";
		$Name = "";
		$UserStatus = "";
	}
} ?>
<main class="form-signin w-100 m-auto">
	<h2 class="text-center"><?php echo $Heading; ?></h2>
	<?php if ( (isset($_SESSION['user_add_error'])) && ($_SESSION['user_add_error'] != "")) {
		echo  "<p><em>" . $_SESSION['user_add_error'] . "</em></p>"; 
	} ?>
	<form action="<?php echo $FormAction; ?>" method="post" name="tour_add" id="tour_add">
		<div class="form-floating mb-3">
			<input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="User Id" value="<?php echo $UserId; ?>">
			<input required type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $Username; ?>">
			<label for="floatingInput">Username</label>
		</div>
		<div class="form-floating mb-3">
			<input required type="password" placeholder="Password" class="form-control" id="password" name="password" value="<?php echo $Password; ?>">
			<label for="password">Password</label>
		</div>
		<div class="form-floating mb-3">
			<input required type="email" class="form-control" id="email" name="email" placeholder="abc@xyz.com" value="<?php echo $Email; ?>">
			<label for="email">Email</label>
		</div>
		<div class="form-floating mb-3">
			<input required type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $Name; ?>">
			<label for="name">Name</label>
		</div>
		<div class="form-floating mb-3">
			<select required class="form-select form-select-lg mb-3" id="status" name="status">
				<?php if ( $UserStatus == "1" ){ ?>
					<option>Select User Status</option>
					<option value = "1" selected>Published</option>
					<option value = "0">Unpublished</option>
				<?php }elseif($UserStatus == "0" ){ ?>
					<option>Select User Status</option>
					<option value = "1">Published</option>
					<option value = "0" selected>Unpublished</option>
				<?php }else{?>
					<option selected>Select User Status</option>
					<option value = "1">Published</option>
					<option value = "0">Unpublished</option>
				<?php }?>
			</select>
			<label for="status">User Status</label>
		</div>
		<button class="btn btn-lg btn-success" type="submit"><?php echo $LblButton;?></button>
	</form>
</main>
<?php include_once( "common/template-end.php" );?>