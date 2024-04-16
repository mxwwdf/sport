<?php

$db = new PDO('mysql:host=localhost;dbname=sport','root', NULL);
$info = [];
session_start();
if($query = $db->query("SELECT * FROM users" )){
   $info = $query->fetchAll(PDO::FETCH_ASSOC);
}
else{
    print_r($db->errorInfo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='/assets/css/style.css'>
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
                <img src="/assets/img_s/logo.png" height="75" width="75" alt="">
            </div>

            <div class='nav'>
                <a class='nav-item' href="#">ГЛАВНАЯ</a>
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
            <a class = "nav__link" href="user.php" >Профиль</a>
           
            <?php endif; ?>
              
                    </div>
                </div>

            </div>

            <div class='burger-menu'>
                <a href="">
                    <img height="55" width="55" src="img_s/burger-img.png" alt="">
                </a>
            </div>
            

        </div>


        <div class='header-down'>

            <div class='header-title'>
                    В здоровом теле

                <div class='header-subtitle'>
                    Здоровый дух
                </div>

                <div class='header-suptitle'>
                    НАШ ДИВИЗ
                </div>

                <div class='header-bth'>
                    <a href='#' class='header-button'>ПОСМОТРЕТЬ СЕКЦИИ</a>
                </div>

            </div>

        </div>

    </div>

</div>

<div class='cards'>

    <div class='container'>

       <div class='cards-holder'>

            <div class='card'>

                <div class='card-image'>
                    <img class='card-img' height="55" width="55" src='/assets/img_s/card.png'>
                </div>

                <div class='card-title'>
                    Множество  <span>Наград</span>
                </div>

                <div class='card-desc'>
                   Команды нашего колледжа, не раз занимали почётные места на разного рода соревнованиях.
                </div>

            </div>

            <div class='card'>

                <div class='card-image'>
                    <img class='card-img' height="55" width="55" src='/assets/img_s/card.png'>
                </div>

                <div class='card-title'>
                    Спортивные <span>Секций</span>
                </div>

                <div class='card-desc'>
                    Каждый сможет найти себя, благодаря разнообразию спортивных секций

                </div>

            </div>

            <div class='card'>

                <div class='card-image'>
                    <img class='card-img' height="55" width="55" src='/assets/img_s/card.png'>
                </div>

                <div class='card-title'>
                   Хорошие  <span>Специалисты</span>
                </div>

                <div class='card-desc'>
                    Наши преподаватели лучшие в своём деле. Смногут найти подход к любому
                </div>

            </div>
        </div>
    </div>

</div>


<div class='history'>

    <div class='container'>

        <div class='history-holder'>
            <div class='history-info'>
                <div class='history-title'>
                    Наша <span>История</span>
                </div>

                <div class='history-desc'>
                    История филиала учреждения образования «Белорусского государственного технологического университета» «Витебский государственный технологический колледж» началась с 11 ноября 1983 года, когда было создано «Витебское среднее городское профессионально – техническое училище № 163». Училище занималась подготовкой кадров в основном для Витебских производственных объединений «Доломит» и «Керамика», которые на протяжении пяти лет являлись базовыми предприятиями училища.
                </div>


                <div class='history-number'>
                    <div class='number-item'>
                        40 <span>Лет</span>
                    </div>

                    <div class='number-item'>
                        5  <span>Отделений</span>
                    </div>

                    <div class='number-item'>
                        1100 <span>Учеников</span>
                    </div>
                </div>
            </div>

            <div class='history-images'>
                <img class='imgages-1' height="355" width="295" src="/assets/img_s/1.jpg" alt="">
                <img class='imgages-2' height="355" width="295" src="/assets/img_s/2.jpg" alt="">
                <img class='imgages-3'height="300" width="260" src="/assets/img_s/3.jpg" alt="">
        </div>
        </div>

    </div>

</div>


<div class='black-block'>

    <div class='container'>

        <div class='block-holder'>
            <div class='left'>
                <div class='left-title'>
                    Записывайтесь на секции <br> И принимайте участие в соревнованиях
                </div>

                <div class='left-text'>
                    Различные секции по многим видам спорта.
                </div>
            </div>

            <div class='right'>
                <div class='right-button'>
                    <a href='#' class='right-btn'>ПОСМОТРЕТЬ</a>
                </div>
            </div>
        </div>

    </div>

</div>


<div class='dishes'>

    <div class='container'>

        <div class='dishes-title'>
           Спортивные секции <span>расписание</span>
        </div>

        <div class='burgers'>
            <div class='burgers-image'>
                <img src='/assets/img_s/sek.jpg' class='pizza'>
            </div>

            <div class='burgers-items'>
                <div class='burger-item'>
                    <img src="/assets/img_s/sek_mini.jpg" class=''>
                    <div class='burger-text'>
                        Многоборье ------ПН-ПТ-------20:00-21-00
                    </div>
                </div>

                <div class='burger-item'>
                    <img src="/assets/img_s/sek_mini.jpg" class=''>
                    <div class='burger-text'>
                        Многоборье ------ПН-ПТ-------20:00-21-00
                    </div>
                </div>

                <div class='burger-item'>
                    <img src="/assets/img_s/sek_mini.jpg" class=''>
                    <div class='burger-text'>
                        Многоборье ------ПН-ПТ-------20:00-21-00
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<div class='menu'>

    <div class='container'>

        <div class='menu-title'>
            Новости спорта
        </div>
        

        <div class='menu-items'>

            <div class='menu-item'>
                <div class='menu-image'>
                    <img src='/assets/img_s/news.jpg' class='menu-img'>
                </div>

                <div class='menu-text'>
                    Легкоатлетический кросс
                </div>

                <div class='menu-subtext'>
                    Легкоатлетический кросс <br>«За единую Беларусь!»
                </div>

                <div class='menu-button'>
                    <a href='#' class='menu-btn'>ЧИТАТЬ</a>
                </div>
            </div>

            <div class='menu-item'>
                <div class='menu-image'>
                    <img src='/assets/img_s/news.jpg' class='menu-img'>
                </div>

                <div class='menu-text'>
                    Легкоатлетический кросс
                </div>

                <div class='menu-subtext'>
                    Легкоатлетический кросс <br> «За единую Беларусь!»
                </div>

                <div class='menu-button'>
                    <a href='#' class='menu-btn'>ЧИТАТЬ</a>
                </div>
            </div>

            <div class='menu-item'>
                <div class='menu-image'>
                    <img src='/assets/img_s/news.jpg' class='menu-img'>
                </div>

                <div class='menu-text'>
                    Легкоатлетический кросс
                </div>

                <div class='menu-subtext'>
                    Легкоатлетический кросс  <br> «За единую Беларусь!»
                </div>

                <div class='menu-button'>
                    <a href='#' class='menu-btn'>ЧИТАТЬ</a>
                </div>

            </div>
        </div>
        <div class='button_p'>
            <a href='news.php' class='p-btn'>ПОДРОБНЕЕ</a>
        </div>
    </div>

</div>

<div class='coment'>

    <div class='container'>

       

        <div class='galery-title'>
            Галерея <span>Событий</span>
        </div>


        <div class='galery-content'>

            <div class='galery-left'>

                <div class='galery-up'>
                    <img class='img-gal high' src="/assets/img_s/10.jpg">
                </div>

                <div class='galery-down'>
                    <img class='img-gal' src="/assets/img_s/20.jpg">
                    <img class='img-gal' src="/assets/img_s/30.jpg">
                </div>

            </div>

            <div class='galery-right'>

                 <div class='galery-up'>
                    <img class='img-gal' src="/assets/img_s/20.jpg">
                    <img class='img-gal' src="/assets/img_s/30.jpg">
                </div>

                <div class='galery-down'>
                    <img class='img-gal high' src="/assets/img_s/10.jpg">
                </div>

            </div>

        </div>


    </div>

</div>


<div class='cook'>

    <div class='container'>

        <div class='cook-title'>
            Наши <span>Преподаватели</span>
        </div>


        <div class='cook-content'>
            <img src='/assets/img_s/1c.jpg'>
            <img src='/assets/img_s/2c.jpg'>
            <img src='/assets/img_s/3c.jpg'>
        </div>

    </div>

</div>


<div class='footer'>
    
</div>


</body>
</html>
