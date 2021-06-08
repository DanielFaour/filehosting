<?php
echo "<p>You are an administrator, $username.</p><br>";

$sql_users =   "SELECT u.user_id, username, userpassword, date_joined, r.rolename
                FROM users AS u
                INNER JOIN user_roles AS ur
                ON u.user_id = ur.user_id
                INNER JOIN roles AS r
                ON r.role_id = ur.role_id
                EXCEPT SELECT u.user_id, username, userpassword, date_joined, r.rolename
                FROM users AS u
                INNER JOIN user_roles AS ur
                ON u.user_id = ur.user_id
                INNER JOIN roles AS r
                ON r.role_id = ur.role_id
                WHERE LOWER(username) = LOWER('admin')
                ORDER BY user_id ASC;";

$result_users = pg_query($dbconnection, $sql_users);

if (pg_numrows($result_users) > 0) {

    echo "<p>List of registered members:</p>";
    echo "<table id='userlist'>
          <tr><th>User ID</th><th>Username</th><th>Password</th><th>Role</th><th>Date Created</th></tr>";

    while ($user = pg_fetch_assoc($result_users)) {
            echo "<tr>";
            echo "  <td>" . $user['user_id'] . "</td>
                    <td>" . $user['username'] . "</td>
                    <td class='hideElement'>" . $user['userpassword'] . "</td>
                    <td>" . $user['rolename'] . "</td>
                    <td>" . $user['date_joined'];
            echo "</tr>";
    }

    echo "</table>";
}   

?>