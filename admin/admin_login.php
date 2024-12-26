<?php  
    include("connection.php");
    session_start();

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $passwd = mysqli_real_escape_string($con, $_POST['password']);

        $sql = "SELECT * FROM admin_detail WHERE a_uname = '$username' AND a_passwd = '$passwd'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['admin'] = $username;
            header("Location: register_user.php");

            if (isset($_POST["rememberme"])) {
                setcookie("username_admin", $username, time() + (86400 * 30), "/"); // 30 days
            } else {
                setcookie("username_admin", "", time() - 3600, "/"); // Expire immediately
            }
        } else {
            $_SESSION['err_login'] = "Invalid Login Attempt. Please verify your email and password.";
            header("Location: index.php");
        }
    }
?>
