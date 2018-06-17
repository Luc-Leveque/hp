<?php
    require "lib/functions.php";

    session_start();
    $pdo = dbConnect();

    $userIp = $_SERVER['REMOTE_ADDR'];
    $limite = $pdo->query("SELECT * FROM ban WHERE ip = $userIp");

    if($limite){
        $limite = $limite->fetch(PDO::FETCH_ASSOC)['limite'];
    }

    $isStillBanned = strtotime($limite) > strtotime(time() - 60*5 );
    if(!$isStillBanned){
        unset($_SESSION['nbFailedAuth']);
        $pdo->query("DELETE FROM ban WHERE ip = '$userIp' ");
    }else{
        die('Vous êtes ban !');
    }

    if($_POST){

        $login = htmlentities($_POST['login']);
        $password = sha1($_POST['password']);

        $req = $pdo->prepare('SELECT COUNT(*) as nb FROM users WHERE login = ? AND password = ?');
        $req->execute([$login, $password]);
        $has = $req->fetch(PDO::FETCH_ASSOC)['nb'];
        if($has){
            header('Location: profil.php');
            die();
        }else{

            if(!isset($_SESSION['nbFailedAuth'])){
                $_SESSION['nbFailedAuth'] = 1;
            }else{
                $_SESSION['nbFailedAuth'] += 1;
            }

            if($_SESSION['nbFailedAuth'] > 3){
                $pdo->query("INSERT INTO ban (ip) VALUES ('$userIp')");
            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


</head>
<body style="padding: 100px;">

<form action="#" method="post">
    <?= input('Login :', 'text', 'login', ['required' => 'required']) ?>
    <?= input('Password :', 'password', 'password', ['required' => 'required', 'placeholder' => '....']) ?>
    <?= submit('submit', 'Se connecter') ?>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>