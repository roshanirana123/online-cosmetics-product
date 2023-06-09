<?php
session_start();
if(isset($_SESSION['email'])){
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="./login.css">


</head>

<body>
    <?php
    include './config/database.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = "";
    
        $query = "SELECT * FROM student_tbl WHERE email='$email'";
        $result = mysqli_query($conn, $query);
    
        if ($row = mysqli_fetch_assoc($result)) {
            // Decrypt the password from the database using the same algorithm and key
            $ciphering_value = "ab";
            $encrypt_key = "nepal";
            $decrypted_password = openssl_decrypt($row['password'], $ciphering_value, $encrypt_key);
    
            if ($password == $decrypted_password) {
                $_SESSION['email'] = $row['email'];
                
            } else {
                $error = "Incorrect email or password!";
            }
        } else {
            $error = "Incorrect email or password!";
        }
    }
    
    ?>

    <div class="main">
        <div>
            <h1>Log In</h1>
        </div>
        <form action="" method="POST">
            <div>
                <?php if (isset($error)) { ?>
                <p class="error">
                    <?php echo $error; ?>
                </p>
                <?php } ?>
            </div>
            <div class="field">
                <span>Email</span>
                <input type="email" name="email" placeholder="" required>
            </div>
            <div class="field">
                <span>Password</span>
                <input type="password" name="password" placeholder="" required>
            </div>
            <div class="register">
                <p>Have not registered yet ?<a href="./registration.php"> Register</a></p>

            </div>
            <div class="home">
                <a href="home.php">Return to Home</a>
            </div>
            <div class="btn">
                <input type="submit" class="submit" name="submit" value="LOGIN">
            </div>
        </form>
    </div>


                </body >
</html>