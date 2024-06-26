<?php
require "db.php";
session_start();
$data = $_REQUEST;
$showError = False;

if(isset($data['signup'])){
    $errors = array();
    $showError = True;
    if((trim($data['firstname']) == '')&&(trim($data['lastname']) == '')&&(trim($data['gmail']) == '')&&(trim($data['password']) == '')&&(trim($data['status']) == '')){
        $errors[] = '';
    }

    if(trim($data['firstname']) == ''){
        $errors[] = '';
    }
    if(trim($data['lastname']) == ''){
        $errors[] = '';
    }
    if(trim($data['gmail']) == ''){
        $errors[] = '';
    }
    if(trim($data['password']) == ''){
        $errors[] = '';
    }
    if(trim($data['status']) == ''){
        $errors[] = '';
    }

    if(trim($data['password']) != trim($data['password_2'])){
        $errors[] = 'Пароли не совпадают!';
    }
    if(mb_strlen($data['password'])<5 || mb_strlen($data['password'])>15){
        $errors[] = 'Недоступная длина пароля!';
    }
    if(R::count('users','gmail = ?',array($data['gmail']))>0){
        $errors[] = 'Пользователь с таким адресом уже существует!';
    }
    print_r($errors);
    if(empty($errors)){
        $user = R::dispense('users');
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->gmail = $data['gmail'];
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        $user->status = $data['status'];
        $user->avatar = 'null_avatar.jpg' ;
        $_SESSION['users'] = R::store($user);
        $_SESSION['users'] = $user->id;
        header('location: vhod.php');
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
               
                
                <h1 class="opacity">Регистрация</h1>
                <form>
                    <input type="text" required name = "firstname" placeholder="Имя" pattern = "^[A-Za-zА-Яа-яЁё]*"/>
                    <input type="text" required name = "lastname" placeholder="Фамилия" pattern = "^[A-Za-zА-Яа-яЁё]*" />
                    <input type="gmail" required name = "gmail" placeholder="Логин" pattern=".+@gmail\.com"/>
                    <input type="password" required name = "password" placeholder="Пароль" />
                    <input type="password" required name = "password_2" placeholder="Подтвердить пароль" />
                    <input type="hidden" required name="status" value="user">
                    <button type="submit" class="opacity" name = "signup">Отправить</button>
                    <a  href="vhod.php" class="registr_text">Уже есть аккаунт</a>
                    <div class ="error__text"><p><?php if($showError){echo showError($errors);}?></p></div>
                </form>
                <div class="register-forget opacity">
                
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        
    </section>
</body>

  <script  src="js/script.js"></script>

</body>
</html>
