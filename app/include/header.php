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

<header>
    <div class="header">
        <div class="conteiner">
            <div class="header-inner">
                <div class="header-logo">
                    <img src="static/img/svg/Logo.svg" alt="Bike Logo" class="header-logo-pic">
                    <a href="<?php echo BASE_URL ?>" class="nav-link">Bike</a>
                </div>

                <form class="header-form" role="search">
                    <input type="search" class="header-form-control" placeholder="Search..." aria-label="Search">
                </form>

                <nav class="nav">
                    <a href="<?php echo BASE_URL . 'about.php'?>" class="nav-link">
                        <img src="static/img/svg/compare.svg" alt="Compare Logo" class="header-menu-pic">
                        Сравнение
                    </a>
                    <a href="<?php echo BASE_URL . 'like.php' ?>" class="nav-link">
                        <img src="static/img/svg/favorites.svg" alt="Compare Logo" class="header-menu-pic">
                        Избранное
                    </a>
                </nav>

                <div class="text-end">
                    <button type="button" class="header-login">Login</button>
                    <button type="button" class="header-sign">Sign-up</button>
                </div>
            </div>
        </div>
    </div>
    <div class="conteiner">
        <div class="second-header">
            <span class="fs-4">Категория</span>
            <div width="70%" align="right">
                    <a href="javascript:history.back();" class="goBack">
                        <span>Назад</span>
                    </a>
                        /
                    <a href="#">
                        <span>Главная</span>
                    </a> 
                        / 
                    <a href="#">
                        <span>Категория</span>
                    </a>
                        /
                    <a href="#">
                        <span>Название</span>
                    </a>  
                </div>
        </div>
        <div class="line_wide"></div>
    </div>
</header>