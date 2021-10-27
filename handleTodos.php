<?php
    session_start();
    include './classes/DB.php';
    include './classes/Todo.php';
    $todo = new Todo($user);
    if(isset($_POST['addTodo'])) {
        $title = $_POST['title'];
        $user = $_SESSION['user_id'];
        $todo->createTodo($user, $title);
        header('Location: ./todoPage.php');
    }

    if(isset($_POST['deleteAll'])) {
        $todo->deleteAll();
        header('Location: ./todoPage.php');
    }

    if(isset($_POST['doneAll'])) {
        $todo->doneAll();
        header('Location: ./todoPage.php');
    }

    if(isset($_POST['deleteTodo'])) {
        $id = $_POST['todo_title'];
        print_r($_POST['delete_todo']);
        $todo->deleteTodo($id);
        header('Location: ./todoPage.php');
    }

    if(isset($_POST['doneTodo'])) {
        $id = $_POST['done_todo'];
        $todo->changeTodoStatus($id);
        header('Location: ./todoPage.php');
    }
?>