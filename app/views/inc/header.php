<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevBlog - A Programmer's Journal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?=URL_ROOT?>/assets/css/styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="<?=URL_ROOT?>/posts" class="logo">
                <i class="fas fa-code"></i>
                <span>DevBlog</span>
            </a>

            <nav>
                <div class="search-bar">
                    <form action="<?= URL_ROOT ?>/posts/search" method="GET">
                        <input type="text" name="q" placeholder="Search..." required>
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <ul class="nav-links">
                    <li><a href="<?=URL_ROOT?>/posts">Home</a></li>
                    <li><a href="<?=URL_ROOT?>/articles">Articles</a></li>
                    <li><a href="<?=URL_ROOT?>/tutorials">Tutorials</a></li>
                    <li><a href="<?=URL_ROOT?>/projects">Projects</a></li>
                    <li><a href="<?=URL_ROOT?>/about">About</a></li>
                    <li><a href="<?=URL_ROOT?>/contact">Contacts</a></li>
                    <li><a href="<?=URL_ROOT?>/auth/login" target="_blank" class="login-nav-btn">Login</a></li>
                </ul>

                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>
