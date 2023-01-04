<?php 
	require_once("config.php");
	$second_header = false;
	$login_css = true;
	require_once("app/controllers/users.php"); 
	require_once("app/include/header.php");
?>

<div class="container">
	<section id="content">
		<form action="Login.php" method="post">
			<h1>Войти</h1>
			<p><?=$errMsg?></p>
			<div>
				<input type="email" name="email" placeholder="Почта" id="username" required="">
			</div>
			<div>
				<input type="password" name="password" placeholder="Пароль" required="" id="password">
			</div>
			<div>
				<input type="submit" value="Войти" name="btn-log"/>
				<a href="#">Забыл пароль?</a>
				<a href="<?php echo BASE_URL . 'Register.php'?>">Регистрация</a>
			</div>
		</form>
	</section>
</div>

<?php require_once("app/include/footer.php"); ?>