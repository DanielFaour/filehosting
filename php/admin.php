<?php
echo "<p>You are an administrator.</p><br>";

$sql_users = "SELECT user_id, username, userpassword, date_joined 
              FROM users 
              EXCEPT SELECT user_id, username, userpassword, date_joined 
              FROM users 
              WHERE LOWER(username) = LOWER($username);";

$result_users = pg_query($dbconnection, $sql_user);

if (pg_numrows($result_users) > 0) {

    echo "<p>List of users:</p>";

    while ($user = pg_fetch_assoc($result_users)) {
        echo "<p>" . $user['user_id'] . " | " . $user['username'] . " | " . $user['userpassword'] . " | " . $user['date_joined'] . "</p>";
    }
}

?>