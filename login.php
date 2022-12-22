<?php require("login.class.php") ?>
<?php 
	if(isset($_POST['submit'])){
		$user = new LoginUser($_POST['username'], $_POST['password']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="styles.css">
	<title>Log in form</title>
</head>
<body>
	<form id="login" action="" method="post" enctype="multipart/form-data" autocomplete="off" >
		<h2>Login form</h2>

		<label>Login</label>
		<input type="text" name="username" required minlength="6">

		<label>Password</label>
		<input type="password" name="password" required minlength="6">

		<button class="login-btn" type="submit" name="submit">Log in</button>

		<p class="question">
            У вас нет аккаунта? - <a href="index.php">зарегистрируйтесь</a>!
    </p>

		<p class="error"><?php echo @$user->error ?></p>
		<p class="success"><?php echo @$user->success ?></p>
	</form>



	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>

