<?php 
	include("config.php");
	$second_header = true;
	include("app/controllers/users.php"); 
	include("app/include/header.php");
?>

<div class="conteiner">
    <div class="main-reg-form">
		<div class="reg-form-info">
			<div class="reg-form-info-top">
				<form action="Register.php" method="post">
					<p><?=$errMsg?></p>
					<input class="text" type="text" name="username" placeholder="Имя пользователя" required="">
					<input class="text email" type="email" name="email" placeholder="Почта" required="">
					<input class="text" type="password" name="pass" placeholder="Пароль" required="">
					<input class="text w3lpass" type="password" name="pass-repeat" placeholder="Повторите пароль" required="">
					<input type="submit" value="Регистрация" name="btn-reg">
				</form>
				<p>Уже есть аккаунт? <a href="<?php echo BASE_URL . 'Login.php'?>"> Войдите!</a></p>
			</div>
		</div>
</div>

<?php include("app/include/footer.php"); ?>