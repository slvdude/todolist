<?php

    if(isset($_POST['submit'])) {
        session_start();
        $login = $_POST['login'];
        $password = $_POST['password'];

        include '../classes/DB.php';
        include '../classes/Auth.php';
        include '../classes/AuthController.php';

        $auth = new AuthController($login, $password);
        $user = $auth->authUser($login, $password);

        header("Location: ../todoPage.php?signin=successful");
 
    }