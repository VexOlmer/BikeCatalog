<?php 
	include("config.php");
	include("app/controllers/users.php"); 
	include("app/include/header.php");
?>

<div class="conteiner">
    <div class="main-reg-form">
		<div class="reg-form-info">
			<div class="reg-form-info-top">
				<form action="Login.php" method="post">
					<p><?=$errMsg?></p>
					<input class="text email" type="email" name="email" placeholder="Почта" required="">
					<input class="text" type="password" name="password" placeholder="Пароль" required="">
					<input type="submit" value="Войти" name="btn-log">
				</form>
				<p>Еще нет аккаунта? <a href="<?php echo BASE_URL . 'Register.php'?>"> Зарегистрируйтесь!</a></p>
			</div>
		</div>
</div>

<?php include("app/include/footer.php"); ?>