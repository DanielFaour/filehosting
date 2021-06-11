<?php
    require 'connect.php';

    
    $user_id = $_GET["user_id"];
        
    if (empty($user_id)) {

    } else {
            echo "<p>$user_id</p>";
            removeUser($user_id, $db_con);

    }

    // remove user from database by user_id
    function removeUser($user_id, $dbconnetion) {
        $sql_removeUserRole = "DELETE FROM user_roles
                           WHERE user_id = '$user_id';";
        
        $sql_removeUser = "DELETE FROM users
                           WHERE user_id = '$user_id';";

        $result_removeUserRole = pg_query($dbconnetion, $sql_removeUserRole);
        $result_removeUser = pg_query($dbconnetion, $sql_removeUser);


    }
        
