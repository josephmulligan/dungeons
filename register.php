<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 14/06/2017
 * Time: 13:05
 */
include("includes/header.php");

$error = NULL;

//handle form input
if(isset($_POST['submit'])) {
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $error = " Please include a name.";
    }
    if (!empty($_POST['username'])) {
        $usr = $_POST['username'];
        //check for similar username
        $query = "select * from users where username='$usr';";
        $result = mysqli_result($conn, $query);
        $count = mysqli_num_rows($result);
        if($count > 0) {
            $error = "Username already taken.";
        }
    } else {
        $error = " Please include a valid username.";
    }
    if (!empty($_POST['password'])) {
        $pwd = $_POST['password'];
        if(strlen($pwd) < 8) {
            $error = "Password is too short!";
        }
    } else {
        $error = "Please provide a password.";
    }
}

?>

<form action="" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <legend>Register</legend>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<?php include("includes/footer.php"); ?>
