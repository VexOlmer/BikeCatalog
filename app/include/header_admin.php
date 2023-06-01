<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title>Bike Catalog</title>

        <link rel="stylesheet" href="../../static/css/reset.css" type="text/css" >
        <link rel="stylesheet" href="../../static/css/admin.css" type="text/css" >
    
    </head>
<body>

<!-- <?php echo test($_SESSION); ?> -->

<header>
    <div class="header">
        <div class="conteiner">
            <div class="header-inner">
                <div class="header-logo">
                    <img src="../../static/img/svg/Logo.svg" alt="Bike Logo" class="header-logo-pic">
                    <a href="<?php echo BASE_URL . 'Main.php' ?>" class="nav-link-header">Bike</a>
                </div>

                <div class="text-end">
                    <a href="#" style="color:#FFF50D; font-size: 150%;"><?php echo $_SESSION['username']; ?></a>
                    <ul>
                        <li><a style="color:#FFF50D; font-size: 150%;" href="<?php echo BASE_URL . "Logout.php"; ?>">Выход</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>