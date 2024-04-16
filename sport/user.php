<?php
require "db.php";
session_start();
$user = R::findOne('users', 'id = ?', array($_SESSION['users']));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/assets/css/user.css'>
    <title>Профиль пользователя</title>
</head>
<body>
<div class='header'>
    <div class='container'>
        <div class='header-line'>
            <div class='header-logo'>
                <img src="/assets/img_s/logo.png" height="75" width="75" alt="">
            </div>

            <div class='nav'>
                <a class='nav-item' href="index.php">ГЛАВНАЯ</a>
                <a class='nav-item' href="news.php">НОВОСТИ</a>
                <a class='nav-item' href="#">СПОРТИВНЫЕ СЕКЦИИ</a>
                <a class='nav-item' href="#">ДОСКА ПОЧЁТА</a>
                <a class='nav-item' href="#">ФОТОГАЛЕРЕЯ</a>
                <a class='nav-item' href="#">МЕРОПРИЯТИЯ</a>
                <a class='nav-item' href="#">ПРЕПОДАВАТЕЛИ</a>

                
            </div>

            <div class='cart'>
                <a href="#">
                   
                </a>
            </div>

            <div class='phone'>
                <div class='phone-holder'>
                    <div class='phone-img'>
                        <img src="/assets/img_s/phone.png" alt="">
                    </div>

                    <div class='number'><a class='num' href='#'>+375-375-37-37</a></div>
                </div>

                <div class='phone-text'>
                    Горячая линяя <br> Филиал БГТУ "ВитГТК"
                </div>
            </div>
            

            <div class='admin-img'>
                <a href="#" > <img src="/assets/img_s/admine.png" height="55" width="55"> </a>
                <div class="list_w">
                    <div class="list">
                    <?php  if(!(isset($_SESSION['users']))):?>
            <a href="registr_user.php">Регистрация</a>
            <a href="vhod.php">Вход</a>
            <?php endif; ?>
            
            <?php 
            if(isset($_SESSION['users'])):?>
            <a class = "nav__link" href="logout.php" >Выйти из аккаунта</a>
           
            <?php endif; ?>
              
                    </div>
                </div>

            </div>

        </div>

<?php if(isset($_SESSION['users'])) : ?>
    <div class="profile-container">
    <div class="profile-header">
        <img src="/assets/avatar/<?php echo $user->avatar;?>" alt="Аватар">
        <h1><?php echo $user->firstname;?>   <?php echo $user->lastname;?></h1>
    </div>
    <div class="profile-details">
        <h2>Основная информация</h2>
        <p><strong>Имя:</strong> <?php echo $user->firstname;?></p>
        <p><strong>Фамилия:</strong> <?php echo $user->lastname;?></p>
        <p><strong>Email:</strong> <?php echo $user->gmail;?></p>
    </div>
    <div class="profile-button">
        <a href="user_editor.php">Редактировать профиль</a>
    </div>
</div>
    <?php endif; ?>


</body>
</html>