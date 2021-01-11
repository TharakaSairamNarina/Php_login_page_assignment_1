<?php
	 session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>LoginPage</title>
    </head>
    <?php 
        $database = 'db_sample';
        $user = 'root';
        $connection = mysqli_connect('localhost',$user,'',$database);
        if(! $connection ) {
            die('Could not connect:  '.mysqli_error());
        }
        
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $passwd = $_POST['pwd'];
            $query = "SELECT * FROM `tbl_signup` WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result) > 0){
                $_SESSION['email'] = $email;
                header('Location:home.php');
            }
            else{
                echo "<p class='error-msg'>Email and Password incorrect!!</p>";
            }
        }
    ?>
    <body>
        <h3>Login Page</h3>
        <form action="" method="POST">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
            <br>

            <label for="password">Password: </label>
            <input type="password" name="pwd" id="password">
            <br>

            <input type="submit" name="submit" value="Login">
        </form>
    </body>
    <style>
        .error-msg{
            color:red;
        }
    </style>
</html>