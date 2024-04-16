<?php
$db = new PDO('mysql:host=localhost;dbname=sport' ,'root', '');
$info = [];

if($query = $db->query("SELECT * FROM news_card" )){
   $info = $query->fetchAll(PDO::FETCH_ASSOC);
}
else{
    print_r($db->errorInfo);
}
session_start();
if($query = $db->query("SELECT * FROM users" )){

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='/assets/css/newsss.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спортивная жизнь ВитГТК</title>
</head>
<body>

<div class='header'>
    <div class='container'>
        <div class='header-line'>
            <div class='header-logo'>
                <img src="img_s/logo.png" height="75" width="75" alt="">
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
                        <img src="img_s/phone.png" alt="">
                    </div>

                    <div class='number'><a class='num' href='#'>+375-375-37-37</a></div>
                </div>

                <div class='phone-text'>
                    Горячая линяя <br> Филиал БГТУ "ВитГТК"
                </div>
            </div>

            

            <div class='admin-img'>
                <a href="#" > <img src="img_s/admin.png" height="55" width="55"> </a>
                <div class="list_w">
                    <div class="list">
                    <?php  if(!(isset($_SESSION['users']))):?>
            <a href="registr_user.php">Регистрация</a>
            <a href="vhod.php">Вход</a>
            <?php endif; ?>
            <?php 
            if(isset($_SESSION['users'])):?>
            <a class = "nav__link" href="logout.php" >Выйти из аккаунта</a>
            <a class = "nav__link" href="user.php" >Профиль</a>
            <?php endif; ?>
                    </div>
                </div>
            </div>       
        </div>
            </div>
        <div class="card_news">
        <?php foreach($info as $sd): ?>
                    <div class="card_item">
                        <div class="about__img" >
                            <img  src = "<?= $sd['img']?> " class="img_news"   alt="" width = "250"  height="150">
                        </div>
                        <a class="title_news" a href="#item_<?=$sd['id']?>" title = "Нажмите, чтобы перейти к разделу"><h2><?= $sd['title']?> </h2></a>
                        <div class="deta_news">Дата публикации: <?= $sd['deta']?> </div>
                        <div class="likes">Лайков: </div>
            <?php 
            if(isset($_SESSION['users'])):?>
            <form action="action/like" method="post">
                            <input type="hidden" value="<?php echo $id;?>" name="id_article">
                            <input type="button" value="like" name="like">
                            <input type="button" value="dislike" name="dislike">
                       
                        </form>
            <?php endif; ?>
                       
                        
                    </div>
                    <?php endforeach; ?>
        </div>
               
            


      