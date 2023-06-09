<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="./registration.css">
</head>

<body>

    <?php
    include './config/database.php';
    
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        //PASSWORD ENCRYPTION
        $ciphering_value = "bf";
        $encrypt_key = "nepal";
        $encrypted_password = openssl_encrypt($password,$ciphering_value,$encrypt_key);

        $query = "INSERT INTO student_tbl (fullname,class,email,mobile,password) VALUES('$fullname','$class','$email','$mobile','$encrypted_password')";

        // $run = mysqli_query($conn, $query);
        $conn->query($query);
        header('location:home.php');
        unset($_SESSION["email"]);
    }
    ?>
    <div class="main">
        <div>
            <h1>Register</h1>
        </div>
        <form action="" method="POST">
            <div class="field">
                <span>Full Name:</span>
                <input type="text" name="fullname" placeholder="" required>
            </div>
            <div class="field">
                <span>E_mail:</span>
                <input type="email" name="email" placeholder="" required>
            </div>
            <div class="field">
                <span>Phone Number:</span>
                <input type="tel" name="mobile" placeholder="" required>
            </div>
            <div class="field">
                <span>Password:</span>
                <input type="password" name="password" placeholder="" required>
            </div>
            <div class="login">
                <p>Already registered ?<a href="login.php"> Log In</a></p>
            </div>
            
            <div class="btn">
                <input type="submit" class="submit" name="submit" value="SUBMIT">
            </div>
        </form>
    </div>


</body>

</html>