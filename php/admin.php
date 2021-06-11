<?php


echo "<p>You are an administrator, $username.</p><br>";

$sql_users =   "SELECT u.user_id, username, userpassword, date_joined, rolename
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
                WHERE LOWER(username) = LOWER('$username')
                ORDER BY rolename, user_id;";

$result_users = pg_query($dbconnection, $sql_users);

// checks if the userlist is empty
if (pg_numrows($result_users) > 0) {

        echo "<p>List of registered members:</p>";
        echo "<table id='userlist'>
          <tr><th>DELETE</th><th>User ID</th><th>Username</th><th>Password</th><th>Role</th><th>Date Created</th></tr>";

        // loops through result rows and prints them (userdata)      
        while ($user = pg_fetch_assoc($result_users)) {
                echo "<tr>";
                if (strtolower($user['rolename']) == strtolower('ADMIN')) {
                        echo '<td class="deleteCell"><button type="submit" class="deleteButtonAdmin"></button></td>';
                } else {
                        echo '<td class="deleteCell"><button type="submit" onclick="deleteUser(' . "this" . "," .$user['user_id'] . ')" class="deleteButton">X</button></td>';
                }

                echo "  <td class='user_id'>" . $user['user_id'] . "</td>
                    <td>" . $user['username'] . "</td>";

                
                if (strtolower($user['rolename']) == strtolower('ADMIN')) {
                        echo "<td class='hideElement'>" . "</td>";
                } else {
                        echo "<td class='hideElement'>" . $user['userpassword'] . "</td>";
                }

                echo " <td>" . $user['rolename'] . "</td>
                    <td>" . $user['date_joined'];
                echo "</tr>";
        }

        echo "</table>";
}

?>

<script type="text/javascript" src="script/deleteUserRow.js"></script>

<?php
        
?>