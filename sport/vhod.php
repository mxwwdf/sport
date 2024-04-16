<?php
require "db.php";
session_start();
$data = $_REQUEST;
$showError = False;

if(isset($data['signin'])){
    $errors = array();
    $showError = True;

    if(trim($data['gmail']) == ''){
        $errors[] = 'Введите адрес электронной почты';
    }
    if(trim($data['password']) == ''){
        $errors[] = 'Введите пароль';
    }

  
    $user = R::findOne('users', 'gmail = ?', array($data['gmail']));

    if($user){
        
        if(password_verify($data['password'], $user->password)){
            $_SESSION['users'] = $user->id;

            if($user->status === 'admin'){
                header("Location: admin.php");
                exit();
            } else {
                header("Location: user.php");
                exit();
            }
        } else {
            $errors[] = 'Неверный пароль';
        }
    } else {
        $errors[] = 'Пользователь не найден';
    }
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel="stylesheet" href="/assets/css/vhood.css">

</head>
<body>

<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
              
                <h1 class="opacity">Вход</h1>
                <form>
                    <input type="text" name="gmail" placeholder="Логин" />
                    <input type="password" name="password" placeholder="Пароль" />
                    <button type="submit" class="opacity" name = "signin">Войти</button>
                    <a  href="registr_user.php" class="registr_text">Еще нет аккаунта</a>
                    <div class ="error__text"><p><?php if($showError){echo showError($errors);}?></p></div>
                </form>
                
            </div>
            <div class="circle circle-two"></div>
        </div>
        
    </section>
</body>
<!-- partial -->
  <script  src="js/script.js"></script>

</body>
</html>
