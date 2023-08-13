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
    <title>Signup - Sales CRM</title>    
    <link rel="stylesheet" href="style.css"/>

</head>
<body>
    <div class="container">
        <?php

        if(isset($_POST["submit"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirm_password"]; //in case: $confirmPassword = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : "";
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            
            $errors = array();

            if (empty($username) OR empty($email) OR empty($password) OR empty($confirmPassword)) {
                array_push($errors, "All are rquired");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors, "Email is not valid");
            }

            if (strlen($password)<8){
                array_push($errors, "Password must be atleast 8 character long");
            }

            if ($password!==$confirmPassword) {
                array_push($errors, "Password does not match");
            }
            require_once "db_connection.php";
            $sql = "SELECT * FROM users_log WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
             array_push($errors,"Email already exists!");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'> $error </div>";
                }
            }

            else {
                $sql = "INSERT INTO users_log (username, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);           
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Signup successfull.</div>";
                } else {
                    die("Something went wrong: "); // Output the specific error message
                }                
            }
        }
        
        ?>


        <form action="signup_form.php" method="post">

        <h2> Signup </h2>

        <div class="form-group">
                <input class="form-design" type="text" name="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <input class="form-design" type="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <input class="form-design" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input class="form-design" type="password" name="confirm_password" placeholder="Confirm password" required>
            </div>
            <div class="custom-button">
                <button type="submit" class="rounded-button" value="SIGN UP" name="submit">SIGN UP</button>
            </div>

        </form>

        <!--span>Password must be at least 8 characters long</span-->

        <div class="redirect-text">
            <h5>Already have an account? <a href="login_form.php">Login now</a></h5>
        </div>

    </div>

    <script src="">
    
</body>
</html>