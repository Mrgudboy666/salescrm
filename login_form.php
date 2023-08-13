<?php
session_start();
if (isset($_SESSION["users_log"])) {
   header("Location: home_form.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sales CRM</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">

        <?php
            if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
                require_once "db_connection.php";
                $sql = "SELECT * FROM users_log WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $username = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($username) {
                    if (password_verify($password, $username["password"])) {
                        session_start();
                        $_SESSION["users_log"] = "yes";
                        header("Location: home_form.php");
                        die();
                    }else{
                        echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger'>Email does not match</div>";
                }
            }
        ?>
        
        <form method="post" action="login_form.php">
            <h2> Login </h2>

                <div class="form-group">
                    <input class="form-design" type="text" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input class="form-design" type="password"  name="password" placeholder="Password" required>
                </div>
                
                <div class="custom-button">
                    <button class="rounded-button" type="submit" name="login"> LOG IN </button>
                </div>
                
        </form>

        <div class="text-already">
            <h5>Don't have an account? <a href="signup_form.php">Signup now</a></h5>
        </div>

    </div>

    <script src="">
    
</body>
</html>