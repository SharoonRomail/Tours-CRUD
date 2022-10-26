<main class="form-signin w-100 m-auto">
	<form action="check_login.php" method="post" name="my_login" id="loginForm">
		<h1 class="fw-normal txt-white">Welcome</h1>
		<?php if ( isset($_SESSION['err_msg'] ) ){
			if ( $_SESSION['err_msg'] != "" ){
				echo "<h3>" . $_SESSION['err_msg'] . "</h3>";	
			}
		} ?>
		<div class="form-floating">
			<input type="text" class="form-control" id="floatingInput" autocomplete="off" name="username" placeholder="Username">
			<label for="floatingInput">Username</label>
		</div>
		<div class="form-floating">
			<input type="password" class="form-control" id="floatingPassword" autocomplete="off" name="password" placeholder="Password">
			<label for="floatingPassword">Password</label>
		</div>
		<button class="btn btn-lg btn-primary" type="submit">Sign in</button>
		<button class="btn btn-lg btn-secondary" type="reset">Reset</button>
	</form>
</main>