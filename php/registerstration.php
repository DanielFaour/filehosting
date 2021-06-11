<?php
    if (empty($_GET)) {
        
    } else {
        $inputUsername = $_GET["username"];
        $inputPassword = $_GET["password"];
        validateUser($inputUsername, $inputPassword, $db_con);
    }

    // checks if prompted user is in database
    function validateUser($inputUsername, $inputPassword, $dbconnection){
        $sql_userData =    "SELECT username
                            FROM users
                            WHERE LOWER(username) = LOWER('$inputUsername');";
        
        $result_getUser = pg_query($dbconnection, $sql_userData);


        if (!$result_getUser) {
            echo "Error ocurred";
            exit;
        }

        // checks if username and password match user in db
        // if result returns 0, there are no instances of promted user
        if (pg_numrows($result_getUser) == 0) {
        // hides regist-form when access is granted
        ?>
            <style type="text/css">#register{display:none;}</style>
        <?php
        echo "<h1>New account is created!</h1>";
        echo "<p>Welcome to the club, $inputUsername.</p>";
        
        // inserts user into database
        $sql_createUser = "INSERT INTO users (username, userpassword)
                           VALUES ('$inputUsername', '$inputPassword');";

        $result_getUser = pg_query($dbconnection, $sql_createUser);

        // gives user a role (standard member)
        $sql_getUserId = "SELECT user_id
                          FROM users
                          WHERE LOWER(username) = LOWER('$inputUsername');";

        $result_getUserId = pg_query($dbconnection, $sql_getUserId);
        
        if (pg_numrows($result_getUserId) == 1) {
            while ($userId = pg_fetch_row($result_getUserId)) {
                $sql_insertUserRole = "INSERT INTO user_roles (user_id, role_id)
                                       VALUES ($userId[0], 2);";
                $result_insertUserRole = pg_query($dbconnection, $sql_insertUserRole);
            }
        }

        } else {
            echo "<p id='errorName' style='color: red;'>Username is taken.</p>";
            echo "<style>#username{background-color: pink;}</style>";
            exit;
        }
}


?>