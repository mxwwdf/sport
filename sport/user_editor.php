<?php
require "db.php";
session_start();
$data = $_POST;
$user = R::findOne('users', 'id = ?', array($_SESSION['users']));

function loadAvatar($avatar){
    $type = $avatar['type'];
    $name = md5(microtime()).'.'.substr($type, strlen("image/"));
    $dir = 'assets/avatar/';
    $avfile = $dir.$name;

    if(move_uploaded_file($avatar['tmp_name'], $avfile)){
        $user = R::findOne('users', 'id = ?', array($_SESSION['users']));
        $user->avatar = $name;
        R::store($user);
    }else{
        return false;
    }

    return true;
}

if(isset($data['set_avatar'])) {
    $avatar = $_FILES['avatar'];
    if (loadAvatar($avatar)) {
        // Если фото успешно загружено, перенаправляем пользователя на страницу user.php
        header("Location: user.php");
        exit; // Важно вызвать exit() после header(), чтобы прекратить выполнение скрипта
    } 
} 

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/assets/css/user_editor.css'>
    <title>Профиль пользователя</title>
</head>
<body>
<div class='header'>
    <div class='container'>

<?php if(isset($_SESSION['users'])) : ?>
    <div class="profile-container">
    <div class="profile-header">
        <img src="assets/avatar/<?php echo $user->avatar;?>" alt="Аватар">
        <h1><?php echo $user->firstname;?>   <?php echo $user->lastname;?></h1>
    </div>
    <form action = "user_editor.php" method = "post" enctype="multipart/form-data">
        <P>Новое фото профиля</P>
        <input class="file" type="file" name="avatar">
   
    <div class="profile-details">
        <h2>Основная информация</h2>
        <p><strong>Имя:</strong> <?php echo $user->firstname;?></p>
        <p><strong>Фамилия:</strong> <?php echo $user->lastname;?></p>
        <p><strong>Email:</strong> <?php echo $user->gmail;?></p>
    </div>
    <div class="profile-button">
    <input class="save_button" type="submit" name="set_avatar" value="Сохранить">
    </form>    
</div>
</div>
    <?php endif; ?>

        


</body>
</html>