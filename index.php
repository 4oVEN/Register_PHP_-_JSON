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

	<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<h2>Register form</h2>


				<label>Login</label>
        <input type="text" name="name" placeholder="Введите свое полное имя">
        <label>Password</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Confirm_password</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <label>Email</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Name</label>
        <input type="text" name="username" placeholder="Введите свое имя">

				<button type="submit" name="submit">Зарегистрироваться</button>
        <p>

		<p class="error"><?php echo @$user->error ?></p>
		<p class="success"><?php echo @$user->success ?></p>
	</form>

</body>
</html>