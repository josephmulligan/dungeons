<?php
include("includes/header.php");
?>
<!-- Add your site or application content here -->

<?php

    if(isset($_POST['login-submit'])) {
        //get login variables
        $usr = $_POST['username'];
        $pwd = $_POST['password'];
        //get password as SHA-1 hash
        $phash = sha1(sha1($pwd."salt")."salt");

        //log user in using credentials
        //set cookie to logged in
        $cookie_name = "loggedIn";

        //query the database
        $query = "select * from users where username = '$usr' and password = '$phash'";

        //get results
        $result = mysqli_query($conn, $query);

        //check the number of rows
        $count = mysqli_num_rows($result);

        if($count == 1) {
            //user found, create cookie
            $cookie_value = $usr;
            setcookie($cookie_name, $cookie_value);
        }

    }

?>

    <form method="post" action="">
        <div class="form-group">
            <label for="username">
                Username
            </label>
            <input type="text" name="username" id="username"/>
        </div>
        <div class="form-group">
            <label for="password">
                Password
            </label>
            <input type="password" name="password" id="password"/>
        </div>
        <button type="submit" class="btn btn-success" name="login-submit">Log in</button>
    </form>

<?php
include("includes/footer.php");
?>