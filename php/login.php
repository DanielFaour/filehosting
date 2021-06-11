<?php
    if (empty($_GET)) {
        
    } else {
        $inputUsername = $_GET["username"];
        $inputPassword = $_GET["password"];
        checkUser($inputUsername, $inputPassword, $db_con);
    }

    // function to check user in database
    function checkUser($username, $password, $dbconnection) {

        $sql_user = "SELECT * FROM users 
                     WHERE LOWER(username) = LOWER('$username') 
                     AND userpassword = '$password';";

        $result_user = pg_query($dbconnection, $sql_user);

        if (!$result_user) {
            echo "Error ocurred";
            exit;
        }
        
        if (pg_numrows($result_user) > 0) {
            // hides login when access is granted
            ?>
                <style type="text/css">#login{display:none;}</style>
            <?php

            while ($row = pg_fetch_row($result_user)) {
                echo "<h1>Access granted.</h1>";   
            }

            $sql_user_roles = "SELECT users.user_id, username, rolename 
                               FROM users 
                               INNER JOIN user_roles 
                               ON users.user_id = user_roles.user_id 
                               INNER JOIN roles 
                               ON roles.role_id = user_roles.role_id 
                               WHERE LOWER(username) = LOWER('$username');";
                               
            $result_user_roles = pg_query($dbconnection, $sql_user_roles);

            // check if user is admin or member
            while ($row = pg_fetch_row($result_user_roles)) {
                $role = "$row[2]";
                if ($role == "ADMIN") {
                    include "php/admin.php";
                } else if ($role == "MEMBR") {
                    include "php/member.php";
                } else {
                    exit;
                }
            }

        } else {
            echo "<p>Access denied.</p>";
        }
    }

?>