<?php 
    session_start();
    $user = $_SESSION['user_id'];
    include './classes/DB.php';
    include './classes/Todo.php';
    $todos = new Todo($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/todo.min.css">
</head>
<body>
    <div class="container">
        <h1>Task list</h1>
        <hr>
        <form action="handleTodos.php" method="POST" class="create_task">
            <input type="text" placeholder="Enter a task" name="title" class="input_task">
            <button type="submit" class="add_task" name="addTodo">Add task</button>
        </form>
        <div class="handle_all">
            <form action="handleTodos.php" method="POST">
                <button class="handle_task" type="submit" name="deleteAll">Remove all</button>   
            </form>
            <form action="handleTodos.php" method="POST">
                <button class="handle_task" type="submit" name="doneAll">Ready all</button>
            </form> 
        </div>
        <hr>
    </div>
</body>
</html>