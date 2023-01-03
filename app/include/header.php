<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>Bike Catalog</title>
        <link rel="stylesheet" href="static/css/reset.css" type="text/css" >
        <link rel="stylesheet" href="static/css/style.css" type="text/css" >
    </head>
<body>

<header>
    <div class="header">
        <div class="conteiner">
            <div class="header-inner">
                <div class="header-logo">
                    <img src="static/img/svg/Logo.svg" alt="Bike Logo" class="header-logo-pic">
                    <a href="<?php echo BASE_URL . 'Main.php' ?>" class="nav-link-header">Bike</a>
                </div>

                <form class="header-search" role="search">
                    <input type="search" class="header-search-control" placeholder="Search..." aria-label="Search">
                </form>

                <?php if (isset($_SESSION['id'])): ?>
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
                <?php endif; ?>

                <div class="text-end">
                    <?php if (isset($_SESSION['id'])): ?>
                        <a href="#">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul>
                            <li><a href="<?php echo BASE_URL . "Logout.php"; ?>">Выход</a> </li>
                        </ul>
                    <?php else: ?>
                            <a href="<?php echo BASE_URL . "Login.php"; ?>" class="header-sign">Войти</a>
                            <ul>
                                <a href="<?php echo BASE_URL . "Register.php"; ?>" class="header-sign">Регистрация</a>
                            </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if($second_header){ ?>
    <div class="conteiner">
        <div class="second-header">
            <span class="second-header-category">
                Шоссейные велосипеды
            </span>
            <div width="70%" align="right" class="second-header-history">
                    <a href="javascript:history.back();" class="goBack">
                        <span>Назад</span>
                    </a>
                        /
                    <a href="<?php echo BASE_URL . "Main.php"; ?>">
                        <span>Главная</span>
                    </a> 
                        / 
                    <!-- <a href="#">
                        <span>Велосипеды</span>
                    </a> -->
                    <span>Велосипеды</span>
                        <!-- /
                    <a href="#">
                        <span>Название</span>
                    </a>   -->
                </div>
        </div>
        <div class="line_wide"></div>
    </div>
    <?php } ?>
</header>