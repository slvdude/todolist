<?php
    if(isset($_POST['submit'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        include '../classes/DB.php';
        include '../classes/Auth.php';
        include '../classes/AuthController.php';

        $auth = new AuthController($login, $password);
        $user = $auth->authUser($login, $password);
        print_r($user);
        if($user == true) {
            header("Location: ../todoPage.php?signin=successful"); 
        } else {
            header("Location: ../index.php?error=inputempty");
        }
    }