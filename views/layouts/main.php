<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Библиотека</title>
</head>
<body>
<header>
    <div class="container">
        <div class="header_inner">
            <a href="<?= app()->route->getUrl('/books') ?>" ><h1>Библиотека</h1></a>
            <nav class="header_nav">
                <?php
                if (!app()->auth::check()):
                    ?>
                    <a class="header_a" href="<?= app()->route->getUrl('/books') ?>">Просмотр книг</a>
                    <a class="header_a" href="<?= app()->route->getUrl('/login') ?>">Войти</a>
                <?php
                else:
                    if (app()->auth::checkRole()):
                        ?>
                        <a class="header_a" href="<?= app()->route->getUrl('/signup') ?>">Добавить сотрудника</a>
                    <?php
                    else:
                        ?>
                        <a class="header_a" href="<?= app()->route->getUrl('/addreader') ?>">Добавить читателя</a>
                    <?php
                    endif;
                    ?>
                    <a class="header_a" href="<?= app()->route->getUrl('/readers')?>">Читатели</a>
                    <a class="header_a" href="<?= app()->route->getUrl('/addbook')?>">Добавить книгу</a>
                    <a class="header_a" href="<?= app()->route->getUrl('/logout')?>">Выход</a>
                <?php
                endif;
                ?>
            </nav>
        </div>
    </div>
</header>

<main>
    <?= $content ?? '' ?>
</main>

<footer>
    <div class="container">
        <p>© Научная библиотека ТГУ. 1997—2023</p>
        <p>Адрес: Г.Томск, пр.Ленина, 34А</p>
        <p>Телефон: 8 (382) 278-51-23</p>
        <p>Email: art@lib.tsu.ru</p>
        <p class="footer_role">© 2022 All Rights Reserved</p>
    </div>
</footer>

</body>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    body {
        height: 98vh;
    }

    .container {
        width: 1200px;
        margin: 0 auto;
    }

    /* header */
    header {
        background-color: #808080;
        height: auto;
        padding: 20px 0;
    }

    .header_inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header_nav {
        display: flex;
    }

    a{
        text-decoration: none;
        color: black;
    }

    .header_a {
        text-decoration: none;
        margin: 0 20px;
        color: black;
    }

    main {
        min-height: 79vh;
    }

    footer {
        background-color: #808080;
        padding: 18px 0;
        font-size: 12px;
    }

    .footer_role {
        margin-top: 15px;
        font-size: 11px;
    }
</style>
</html>