<?php 
    session_start();
    $user = $_SESSION['user_id'];
    include './classes/DB.php';
    include './classes/Todo.php';
    $todos = new Todo($user);
    $todoArr = $todos->getTodosByUserId($user);

    if(isset($_POST['logout'])) {
        header("Location: ./index.php");
        unset($_SESSION['user_id']);
    }
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
    <form action="todoPage.php" class="logout" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
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
        <?php if(!empty($todoArr)): ?>     
                <ul>
                    <?php foreach($todoArr as $todo): ?>
                        <li>
                            <div class='todo_container'>
                                <div>
                                    <p class='todo_title'><?php echo $todo['description'] ?></p>
                                    <div class="btn_container">
                                        <form action="handleTodos.php" method="POST">
                                            <input class='done_todo' type="hidden" name="done_todo" value="<?php echo $todo['id']?>"><?php echo $todo['id']?></input>
                                            <button class='done_todo' name="doneTodo" type="submit">Ready</button>
                                        </form>
                                        <form action="handleTodos.php" method="POST">
                                            <input type="hidden" name="todo_title" value="<?php echo $todo['id']?>">
                                            <button class='delete_todo' name="deleteTodo" type="submit">Delete</button>
                                        </form> 
                                    </div>
                                </div>
                                <div class='round<?php echo $todo['status']? ' done': ''?>'></div>
                            </div>
                        </li>
                        <hr>
                    <?php endforeach; ?>
                </ul>
            <?php else: echo '<p style="color: red; font-size: 20px;">No tasks yet</p>'?>
            <?php endif; ?>
    </div>
</body>
</html>