<?php require("register.class.php") ?>
<?php
	if(isset($_POST['submit'])){
		$user = new RegisterUser($_POST['name'], $_POST['password'], $_POST['password_confirm'],  $_POST['email'],$_POST['username']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="styles.css">
	<title>Register form</title>
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data" autocomplete="off" id="register">
		<h2>Register form</h2>


				<label>Login</label>
        <input type="text" name="username" minlength="6" placeholder="Введите свое полное имя" required>
        <label>Password</label>
        <input type="password" name="password" id="password" minlength="6" placeholder="Введите пароль" required>
        <label>Confirm_password</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Подтвердите пароль" required>
        <label>Email</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты" required>
        <label>Name</label>
        <input type="text" name="name" minlength="2" placeholder="Введите свое имя" required>

				<button type="submit" name="submit">Зарегистрироваться</button>
        

				<p class="question">
            У вас уже есть аккаунт? - <a href="login.php">авторизируйтесь</a>!
        </p>

		<p class="error"><?php echo @$user->error ?></p>
		<p class="success"><?php echo @$user->success ?></p>
	</form>

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>