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
                    <?php if (isset($_SESSION['id'])): ?>
                        <a href="#">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul>
                            <li><a href="<?php echo BASE_URL . "Logout.php"; ?>">Выход</a> </li>
                        </ul>
                        <?php else: ?>
                                <a href="<?php echo BASE_URL . "Login.php"; ?>" class="header-sign">Войти</a>
                            </a>
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
    <?php } ?>
</header>