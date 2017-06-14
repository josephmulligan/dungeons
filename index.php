<?php
include("includes/header.php");
?>
<!-- Add your site or application content here -->

<?php

    if(isset($_POST['login-submit'])) {
        //get login variables
        if (isset($_POST['username'])) {
            $usr = htmlspecialchars($_POST['username']);
        } else {
            $usr = "";
            create_error_message("no_user", "Please enter a valid username.", 5000);
        }
        if (isset($_POST['password'])) {
            $pwd = htmlspecialchars($_POST['password']);
        } else {
            $pwd = "";
            create_error_message("no_pass", "Please enter a password.", 5000);
        }
        //get password as SHA-1 hash
        $phash = sha1(sha1($pwd."salt")."salt");

        //log user in using credentials
        //set cookie to logged in
        $cookie_name = "logged-in";

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
        } else {
            create_error_message("incorrect-login", "Incorrect Login Details. Please Try Again.", 5000);
        }

    }

?>

    <form action="" method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Log In</legend>
        </div>

        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary" id="login-submit">Submit</button>
            </div>
        </div>
    </form>
<p>Not got an account? <a href="register.php">Sign up for free</a>.</p>

<?php
include("includes/footer.php");
?>