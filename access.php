<?php
    session_start();
    require 'php/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/access.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">/ Home</a></li>
                <li id="selectedPage"><a href="access.php">/ Access</a></li>
                <li><a href="register.php">/ Register</a></li>
            </ul>
        </nav>
    </header>
</body>

<div id="content">

    <form id="login" method="GET" autocomplete="off">
        <h1>
            Login to access service
        </h1>
        <label for="username">Username:</label><br><br>
        <input class="textInput" type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br><br>
        <input class="textInput" type="password" id="password" name="password" required><br><br>
        <input class="button" type="submit" value="Login">
        <p>
            Don't have an user? <a href="register.php">Click here!</a>
        </p>
    </form>

    <?php
        include "php/login.php";
    ?>


</div>

</html>