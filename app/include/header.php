<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bike Catalog</title>
        <link rel="stylesheet" href="static/css/reset.css">
        <link rel="stylesheet" href="static/css/style.css">
    </head>
<body>

    <header class="header">
        <div class="conteiner">
            <div class="header__inner">
                <div class="header__logo">
                    <img src="static/img/svg/Logo.svg" alt="Bike Logo" class="header__logo-pic">
                    <a href="<?php echo BASE_URL ?>" class="nav__link">Bike</a>
                </div>

                <nav class="nav">
                    <img src="static/img/svg/compare.svg" alt="Compare Logo" class="header__menu-pic">
                        <a href="<?php echo BASE_URL . 'about.php'?>" class="nav__link">Сравнение</a>
                    <img src="static/img/svg/favorites.svg" alt="Favorites Logo" class="header__menu-pic">
                        <a href="<?php echo BASE_URL . 'like.php' ?>" class="nav__link">Избранное</a>
                </nav>
            </div>
        </div>
    </header>