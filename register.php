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
    <link rel="stylesheet" href="style/register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet"> 
    <script src="script/validateRegForm.js"></script> 
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">/ Home</a></li>
                <li><a href="access.php">/ Access</a></li>
                <li id="selectedPage"><a href="register.php">/ Register</a></li>
            </ul>
        </nav>
    </header>
</body>

<div id="content">
    <form id="register" method="GET" onsubmit="return validatePassword()" autocomplete="off">
        <h1>
            Register a new user
        </h1>
        <label for="username">Username:</label><br><br>
        <input class="textInput" type="text" name="username" id="username" minlength="3" maxlength="16" required><br><br>

        <label for="password">Password:</label><br><br>
        <input class="textInput" type="password" name="password" id="password" minlength="4" maxlength="16" required><br><br>

        <label for="password">Confirm password:</label><br><br>
        <input class="textInput" type="password" name="rpt_password" id="rpt_password" minlength="4" maxlength="16" required><br><br>

        <button type="submit" class="button">Register</button>

        <p>Already have an user? <a href="access.php">Click here!</a></p>

        <p id="errorPass" style="display: none;">Password must match*</p>
    </form>

    <?php
        include "php/registerstration.php";
    ?>

</div>

</html>