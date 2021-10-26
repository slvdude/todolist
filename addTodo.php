<?php
    session_start();
    include './classes/DB.php';
    include './classes/Todo.php';
    if(isset($_POST['addTodo'])) {
        $title = $_POST['title'];
        $user = $_SESSION['user_id'];
        $todo = new Todo($user);
        print_r($todo->createTodo($user, $title));
        //header('Location: ./todoPage.php');
    }
?>