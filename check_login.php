<?php include_once("common/db.php");
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die ('Error connecting to database');
$Show_Nav = false;
$Page_Heading = "Check Login...";
include_once("common/template-start.php");
//PrintR( $_POST );

/* LOGIN */
$username = $_POST['username'];
$password = $_POST['password'];
$invalid_msg = "Invalid username / password";
$md5_pass = md5($password);
//$md5_pass = $password;

$query = "SELECT * FROM `tbl_users` WHERE `username` = '" . mysqli_escape_string($conn, $username) . "' AND `password` = '" . mysqli_escape_string($conn, $md5_pass) . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$count = $result->num_rows;

if ($count >=1){
	if ($row['status'] == 1){
		$_SESSION['userid'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['err_msg'] = '';
		echo '<h1 class="text-center">Welcome...</h1>';
		RedirectTo("tours.php");
		exit;
	}else{
		$_SESSION['err_msg'] = $invalid_msg;
		echo '<h1 class="text-center">Ooops something wrong...</h1>';
		echo '<div id="countDown"></div>';
		//RedirectTo("index.php");
		//exit;
	}
}else{
	$_SESSION['err_msg'] = $invalid_msg;
	echo '<h1 class="text-center">No account present...</h1>';
	echo '<div id="countDown"></div>';
	//RedirectTo("index.php");
	//exit;
}
mysqli_close($conn);
/* LOGIN */ 
if ( $_SESSION['err_msg'] != "" ){ ?>
<script type="text/javascript">
var count = 3;
setInterval(function(){
	count--;
	document.getElementById('countDown').innerHTML = "<h4 class='text-center'>Redirecting in " + count + "</h4>";
	if (count == 0) {
		window.location = 'index.php'; 
	}
},1000);
</script>
<?php }
include_once( "common/template-end.php" );?>