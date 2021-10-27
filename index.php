<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to TODOLIST</h1>
        <div class="form-container">
            <form action="includes/auth.inc.php" method="post" class="login-form">
                <h2>Sign in</h2>
                <input type="text" name="login" placeholder="Login" class="login-input"><br>
                <input type="password" name="password" placeholder="Password" class="login-input"><br>
                <button type="submit" name="submit" class="login-btn">Sign in</button><br>
            </form>
        </div>
    </div>
</body>
</html>