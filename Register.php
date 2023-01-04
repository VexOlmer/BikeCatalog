<?php 
	require_once("config.php");
	$second_header = false;
	$login_css = true;
	require_once("app/controllers/users.php"); 
	require_once("app/include/header.php");
?>

<div class="container">
	<section id="content">
		<form action="Register.php" method="post">
			<h1>Регистрация</h1>
			<p><?=$errMsg?></p>
			<div>
				<input type="text" name="username" placeholder="Имя пользователя" id="username" required="">
			</div>
			<div>
				<input type="email" name="email" placeholder="Почта" id="username" required="">
			</div>
			<div>
				<input type="password" name="pass" placeholder="Пароль" id="password" required="">
			</div>
			<div>
				<input type="password" name="pass-repeat" placeholder="Повторите пароль" required="" id="password">
			</div>
			<div>
				<input type="submit" value="Регистрация" name="btn-reg"/>
				<a href="<?php echo BASE_URL . 'Login.php'?>">Войти</a>
			</div>
		</form>
	</section>
</div>

<?php require_once("app/include/footer.php"); ?>