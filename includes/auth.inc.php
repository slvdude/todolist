<?php
    session_start();
    if(isset($_POST['submit'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        include '../classes/DB.php';
        include '../classes/Auth.php';
        include '../classes/AuthController.php';

        $auth = new AuthController($login, $password);
        if($auth->authUser() == true) {
            header("Location: ../todoPage.php?success"); 
        } 
        else if ($auth->signupUser() == true) {
            $auth->authUser();
            header("Location: ../todoPage.php?success"); 
        } 
        else {
            header("Location: ../index.php?error=usernametaken");
        }
    }