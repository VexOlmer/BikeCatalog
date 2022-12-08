<?php include("app/include/header.php"); ?>

<div class="conteiner">
    <div class="main-reg-form">
		<div class="reg-form-info">
			<div class="reg-form-info-top">
				<form action="#" method="post">
					<input class="text" type="text" name="Username" placeholder="Имя пользователя" required="">
					<input class="text email" type="email" name="email" placeholder="Почта" required="">
					<input class="text" type="password" name="password" placeholder="Пароль" required="">
					<input class="text w3lpass" type="password" name="password" placeholder="Повторите пароль" required="">
					<input type="submit" value="Регистрация">
				</form>
				<p>Уже есть аккаунт? <a href="<?php echo BASE_URL . 'Login.php'?>"> Войдите!</a></p>
			</div>
		</div>
</div>

<?php include("app/include/footer.php"); ?>