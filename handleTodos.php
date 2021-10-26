<?php
    session_start();
    include './classes/DB.php';
    include './classes/Todo.php';
    $todo = new Todo($user);
    if(isset($_POST['addTodo'])) {
        $title = $_POST['title'];
        $user = $_SESSION['user_id'];
        print_r($user);
        $todo->createTodo($user, $title);
        //header('Location: ./todoPage.php');
    }

    if(isset($_POST['deleteAll'])) {
        $todo->deleteAll();
    }

    if(isset($_POST['doneAll'])) {
        $todo->doneAll();
    }
?>